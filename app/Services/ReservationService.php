<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ReservationRepository;
use App\Repositories\Eloquent\StationOwnerRepository;

class ReservationService
{
    protected ReservationRepository $reservationRepository;
    protected StationOwnerRepository $stationOwnerRepository;

    public function __construct(
        ReservationRepository $reservationRepository,
        StationOwnerRepository $stationOwnerRepository
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->stationOwnerRepository = $stationOwnerRepository;
    }

    public function getListReservations($user_id)
    {
        $reservations = $this->reservationRepository->getListReservations($user_id);

        return $reservations;
    }

    public function createReservation($user_id, $request)
    {
        $reservation = $this->reservationRepository->createReservation($user_id, $request);
        return $reservation;
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
