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
        $owner_id = auth()->guard('reservation_owner')->user()->id;
        $reservations = $this->model->station;

        return $reservations;
    }

    public function createReservation($request)
    {
        try {
            $reservation = $this->model->create([
                "user_id" => auth()->guard('users')->user()->id,
                "vehicle_id" => $request->id,
                "station_start_id" => $request->station_start_id,
                "station_end_id" => $request->station_end_id,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "insurance_fee" => $request->insurance_fee,
                "per_night_price" => $request->per_night_price,
                "count_day" => $request->count_day,
                "created_by" => auth()->guard('users')->user()->id,
            ]);
        } catch (Exception $e) {
            back()->with(['error' => __('messages.create_data_failed')]);
        }
        return $reservation;
    }

    public function editReservation(Request $request)
    {
        $reservation = $this->validateReservation($request->id);
        try {
            $reservation = $reservation::update([
                "user_id",
                "vehicle_id",
                "station_start_id",
                "station_end_id",
                "start_time",
                "end_time",
                "overtime",
                "status",
                "unit_price",
                "usage_fee",
                "insurance_fee",
                "total_amount",
                "cancel_at",
                "cancel_reason",
                "per_night_price",
                "count_day",
                "unit_over_time",
                "unit_over_time_price",
                "created_by",
                "updated_by",
            ]);
        } catch (Exception $e) {
            back()->with(['error' => __('messages.update_data_failed')]);
        }
        return $reservation;
    }

    public function showReservation($reservation_id)
    {
        return $this->model->findOrFail($reservation_id);
    }

    public function cancelReservation($reservation_id)
    {
        $reservation = $this->model->findOrFail($reservation_id);
        $reservation->delete();
    }

    private function validateReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        return $reservation;
    }
}
