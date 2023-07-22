<?php

namespace App\Services;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ReservationRepository;
use App\Repositories\Eloquent\StationOwnerRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\VehicleDetailRepository;
use Carbon\Carbon;

class ReservationService
{
    protected ReservationRepository $reservationRepository;
    protected StationOwnerRepository $stationOwnerRepository;
    protected VehicleDetailRepository $vehicleDetailRepository;
    protected UserRepository $userRepository;

    public function __construct(
        ReservationRepository $reservationRepository,
        StationOwnerRepository $stationOwnerRepository,
        VehicleDetailRepository $vehicleDetailRepository,
        UserRepository $userRepository,
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->stationOwnerRepository = $stationOwnerRepository;
        $this->vehicleDetailRepository = $vehicleDetailRepository;
        $this->userRepository = $userRepository;
    }

    public function getListReservations($user_id)
    {
        $reservations = $this->reservationRepository->getListReservations($user_id);

        return $reservations;
    }

    public function createReservation($vehicle_detail_id, Request $request)
    {
        $user_id = auth()->guard('user')->user()->id;
        if ($user_id) {
            $details = $this->vehicleDetailRepository->find($vehicle_detail_id);
            $reservation = $this->reservationRepository->createReservation($user_id, $details, $request);

            return $reservation;
        }

        return redirect()->route('user.login');
    }

    public function editReservation(Request $request)
    {
        // $reservation = $this->validateStation($request->id);
        // if ($reservation) {
        //     $reservation = $this->reservationRepository->createStation($request);
        //     return $reservation;
        // }
        // return;
    }

    public function showReservation($reservation_id)
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
        $data['user'] = $user->toArray();
        unset($data['user_id'], $data['vehicle_id'], $data['station_end_id']);

        return $data;
    }

    public function cancelReservation($reservation_id)
    {
        // $reservation = $this->reservationRepository->deleteStation($reservation_id);
    }
}
