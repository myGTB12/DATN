<?php

namespace App\Repositories\Eloquent;

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
        $this->model->all()->where('');
    }

    public function createReservation($user_id, $details, $request)
    {
        try {
            $this->model->create([
                "user_id" => $user_id,
                "vehicle_id" => $details->vehicle_id,
                "station_start_id" => $request->station_start_id,
                "station_end_id" => $request->station_end_id,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "status" => 1,
                "usage_fee" => $details->usage_fee,
                "insurance_fee" => $details->infurance_fee,
                "total_amount" => $request->total_amount,
                "per_night_price" => $details->per_night_price,
                // "count_day",
                "over_time_price" => $details->over_time_price,
            ]);
        } catch (Exception $e) {
            back()->with('error', __('messages.create_data_failed'));
        }
    }
}
