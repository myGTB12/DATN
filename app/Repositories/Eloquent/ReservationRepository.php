<?php

namespace App\Repositories\Eloquent;

use App\Enums\ActivityStatus;
use Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReservationRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Reservation::class;
    }

    public function getListReservations()
    {
        $query = $this->model->select("reservations.*")->whereNull("reservations.deleted_at")
            ->join("stations", "stations.id", "=", "reservations.station_start_id")
            ->join("station_owners", "stations.owner_id", "=", "station_owners.id");

        return $query->orderByDesc("reservations.updated_at")->distinct()->get();
    }

    public function createReservation($user_id, $details, Request $request, $station_start_id)
    {
        try {
            $reservation = $this->model->create([
                "user_id" => $user_id,
                "vehicle_id" => $details->vehicle_id,
                "station_start_id" => $station_start_id,
                "station_end_id" => $request->station_end_id,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "status" => ActivityStatus::ACTIVE->value,
                "usage_fee" => $details->usage_fee,
                "insurance_fee" => $details->insurance_fee,
                "total_amount" => $details->per_night_price + $details->usage_fee + $details->infurance_fee,
                "per_night_price" => $details->per_night_price,
                "over_time_price" => $details->over_time_price,
            ]);

            return $reservation;
        } catch (Exception $e) {
            return back()->with('error', __('messages.create_data_failed'));
        }
    }
}
