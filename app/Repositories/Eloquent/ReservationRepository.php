<?php

namespace App\Repositories\Eloquent;

use App\Enums\ActivityStatus;
use Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\ReservationRepositoryInterface;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Reservation::class;
    }

    public function getListReservations($stationOwner_id)
    {
        $query = $this->model->select("reservations.*", "vehicle_details.car_name")
            ->whereNull("reservations.deleted_at")
            ->join("stations as start_station", "start_station.id", "=", "reservations.station_start_id")
            ->join("station_owners", "start_station.owner_id", "=", "station_owners.id")
            ->join("vehicles", "vehicles.id", "=", "reservations.vehicle_id")
            ->join("vehicle_details", "vehicle_details.vehicle_id", "=", "vehicles.id")
            ->join("stations as end_station", "end_station.id", "=", "reservations.station_end_id")
            ->addSelect(DB::raw("start_station.name as station_start_name, end_station.name as station_end_name"))
            ->where("station_owners.id", $stationOwner_id);

        return $query->orderByDesc("reservations.updated_at")->distinct()->get();
    }

    public function showReservation($request, $id)
    {
        $query = $this->model->select("vehicle_details.*", "start_station.*", "reservations.*")
            ->join("stations as start_station", "start_station.id", "=", "reservations.station_start_id")
            ->join("station_owners", "start_station.owner_id", "=", "station_owners.id")
            ->join("vehicles", "vehicles.id", "=", "reservations.vehicle_id")
            ->join("vehicle_details", "vehicle_details.vehicle_id", "=", "vehicles.id")
            ->join("stations as end_station", "end_station.id", "=", "reservations.station_end_id")
            ->addSelect(DB::raw("start_station.name as station_start_name, end_station.name as station_end_name"));

        return $query->get()->all();
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
                "status" => ActivityStatus::REGISTER->value,
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

    public function getUserReservations($id)
    {
        return $this->model->select("vehicle_details.*", "reservations.*")->where("user_id", $id)
            ->join("vehicles", "vehicles.id", "=", "reservations.vehicle_id")
            ->join("vehicle_details", "vehicles.id", "=", "reservations.vehicle_id")
            ->limit(20)->orderByDesc("reservations.created_at")
            ->get();
    }

    public function getReservation($id)
    {
        $query = $this->model->select("vehicle_details.*", "start_station.*", "reservations.*")
            ->join("stations as start_station", "start_station.id", "=", "reservations.station_start_id")
            ->join("station_owners", "start_station.owner_id", "=", "station_owners.id")
            ->join("vehicles", "vehicles.id", "=", "reservations.vehicle_id")
            ->join("vehicle_details", "vehicle_details.vehicle_id", "=", "vehicles.id")
            ->join("stations as end_station", "end_station.id", "=", "reservations.station_end_id")
            ->addSelect(DB::raw("start_station.name as station_start_name, end_station.name as station_end_name"))
            ->where("reservations.id", $id);

        return $query->first();
    }
}
