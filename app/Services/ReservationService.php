<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ReservationRepository;
use App\Repositories\Eloquent\StationOwnerRepository;
use App\Repositories\Eloquent\VehicleDetailRepository;

class ReservationService
{
    protected ReservationRepository $reservationRepository;
    protected StationOwnerRepository $stationOwnerRepository;
    protected VehicleDetailRepository $vehicleDetailRepository;

    public function __construct(
        ReservationRepository $reservationRepository,
        StationOwnerRepository $stationOwnerRepository,
        VehicleDetailRepository $vehicleDetailRepository
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->stationOwnerRepository = $stationOwnerRepository;
        $this->vehicleDetailRepository = $vehicleDetailRepository;
    }

    public function getListReservations($user_id)
    {
        $reservations = $this->reservationRepository->getListReservations($user_id);

        return $reservations;
    }

    public function createReservation($vehicle_detail_id, Request $request)
    {
        $user_id = auth()->guard('user')->user();
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
        // return $this->reservationRepository->showStation($reservation_id);
    }

    public function cancelReservation($reservation_id)
    {
        // $reservation = $this->reservationRepository->deleteStation($reservation_id);
    }
}
