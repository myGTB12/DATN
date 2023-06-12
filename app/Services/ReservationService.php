<?php

namespace App\Services;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationRepository;

class ReservationService
{
    protected StationRepository $reservationRepository;

    public function __construct(StationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function getListReservations()
    {
        $reservations = $this->reservationRepository->getListStations();

        return $reservations;
    }

    public function createReservation($request)
    {
        $reservation = $this->reservationRepository->createStation($request);
        return $reservation;
    }

    public function editReservation(Request $request)
    {
        $reservation = $this->validateStation($request->id);
        if ($reservation) {
            $reservation = $this->reservationRepository->createStation($request);
            return $reservation;
        }
        return;
    }

    public function showReservation($reservation_id)
    {
        return $this->reservationRepository->showStation($reservation_id);
    }

    public function cancelReservation($reservation_id)
    {
        $reservation = $this->reservationRepository->deleteStation($reservation_id);
    }

    private function validateStation($id)
    {
        $reservation = Station::findOrFail($id);
        return $reservation;
    }
}
