<?php

namespace App\Services;

use Carbon\Carbon;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Enums\ActivityStatus;
use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\VehicleRepository;
use App\Repositories\Eloquent\ReservationRepository;
use App\Repositories\Eloquent\StationOwnerRepository;
use App\Repositories\Eloquent\VehicleDetailRepository;

class ReservationService
{
    protected ReservationRepository $reservationRepository;
    protected StationOwnerRepository $stationOwnerRepository;
    protected VehicleDetailRepository $vehicleDetailRepository;
    protected UserRepository $userRepository;
    protected VehicleRepository $vehicleRepository;

    public function __construct(
        ReservationRepository $reservationRepository,
        StationOwnerRepository $stationOwnerRepository,
        VehicleDetailRepository $vehicleDetailRepository,
        UserRepository $userRepository,
        VehicleRepository $vehicleRepository,
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->stationOwnerRepository = $stationOwnerRepository;
        $this->vehicleDetailRepository = $vehicleDetailRepository;
        $this->userRepository = $userRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getListReservations()
    {
        $stationOwner_id = auth()->guard('station_owner')->user()->id;

        return $this->reservationRepository->getListReservations($stationOwner_id);
    }

    public function approve($request, $id)
    {
        $this->reservationRepository->update($id, ["status" => $request->status]);
    }

    public function createReservation($vehicle_detail_id, Request $request)
    {
        $user_id = auth()->guard('user')->user()->id;
        if ($user_id) {
            $details = $this->vehicleDetailRepository->find($vehicle_detail_id);
            $this->vehicleRepository->update($details->vehicle_id, ['status' => ActivityStatus::INACTIVE->value]);
            $station_start_id = $details->vehicle->stations->id;
            $reservation = $this->reservationRepository->createReservation($user_id, $details, $request, $station_start_id);

            return $reservation;
        }

        return redirect()->route('user.login');
    }

    public function showReservation(Request $request, $id)
    {
        $data = $this->reservationRepository->showReservation($request, $id);
        $data = $data[0];
        $data->user_informations = User::find($data->user_id) ?? null;
        $data->address = Helper::getStationAddress($data->district, $data->city);

        return $data;
    }

    public function previewReservation($reservation_id)
    {
        $reservation = $this->reservationRepository->find($reservation_id);
        $data = $reservation->toArray();
        $user = $this->userRepository->find($data['user_id']);
        $details = $reservation->vehicelDetail;
        $station = $details->vehicle->stations;

        $data['station'] = $station->toArray();
        $data['start_time'] = Carbon::parse($data['start_time'])->format('Y-m-d H:i:s');
        $data['end_time'] = Carbon::parse($data['end_time'])->format('Y-m-d H:i:s');
        $data['address'] = Helper::getStationAddress($station->district, $station->city);
        $data['details'] = $details->toArray();
        $data['owner'] = $station->stationOwner()->get()->toArray();
        $data['user'] = $user->toArray();
        unset(
            $data['user_id'],
            $data['vehicle_id'],
            $data['station_end_id'],
            $data['owner']['admin_id'],
            $data['owner']['created_at'],
            $data['owner']['updated_at'],
        );

        return $data;
    }

    public function cancelReservation($reservation_id)
    {
        // $reservation = $this->reservationRepository->deleteStation($reservation_id);
    }

    public function show($id)
    {
        $reservation = $this->reservationRepository->getReservation($id);

        return $reservation;
    }

    public function userReservations($id)
    {
        $reservations = $this->reservationRepository->getUserReservations($id);

        return $reservations;
    }
}
