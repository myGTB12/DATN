<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ReservationRepositoryInterface extends RepositoryInterface
{
    public function getListReservations($stationOwner_id);
    public function showReservation($request, $id);
    public function createReservation($user_id, $details, Request $request, $station_start_id);
}
