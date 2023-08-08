<?php

namespace App\Repositories\Eloquent;

use Exception;
use App\Models\Station;
use App\Enums\StationStatus;
use Illuminate\Http\Request;
use App\Enums\ActivityStatus;
use App\Repositories\Interfaces\StationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StationRepository extends BaseRepository implements StationRepositoryInterface
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Station::class;
    }

    public function getListStations($status = null)
    {
        if ($status) {
            $stations = $this->model->select("stations.*")
                ->where('stations.status', StationStatus::PENDING->value)
                ->leftJoin(
                    "vehicles",
                    "vehicles.station_id",
                    "=",
                    "stations.id"
                )
                ->groupBy('stations.id')
                ->addSelect(DB::raw("COUNT(vehicles.id) as amount_of_vehicles"))
                ->orderBy('stations.created_at', 'asc')
                ->get()->all();

            return $stations;
        }
        $owner_id = auth()->guard('station_owner')->user()->id;
        $stations = $this->model->where('owner_id', $owner_id)->get()->all();
        return $stations;
    }

    public function createStation(Request $request)
    {
        try {
            $station = $this->model->create([
                "name" => $request->name,
                "status" => StationStatus::PENDING->value,
                "owner_id" => auth()->guard('station_owner')->user()->id,
                "address" => $request->address,
                "mail_address" => $request->mail_address,
                "phone" => $request->phone,
                "start_business_time" => $request->start_business_time,
                "end_business_time" => $request->end_business_time,
                "maintenance_time" => $request->maintenance_time,
                "always_open" => $request->always_open,
            ]);
        } catch (Exception $e) {
            back()->with(['error' => __('messages.create_data_failed')]);
        }

        return true;
    }

    public function editStation(Request $request)
    {
        if (!$request->always_open) {
            $request->merge(['always_open' => 0]);
        }
        if (!$request->status) {
            $request->merge(['status' => ActivityStatus::INACTIVE->value]);
        }
        try {
            $station = $this->getModel()::where('id', $request->id)->update([
                "name" => $request->name,
                "status" => $request->status,
                "address" => $request->address,
                "mail_address" => $request->mail_address,
                "phone" => $request->phone,
                "start_business_time" => $request->start_business_time,
                "end_business_time" => $request->end_business_time,
                "maintenance_time" => $request->maintenance_time,
                "always_open" => $request->always_open,
            ]);
        } catch (Exception $e) {
            back()->with(['error' => __('messages.update_data_failed')]);
        }
    }

    public function showStation($station_id)
    {
        return $this->model->findOrFail($station_id);
    }

    public function deleteStation($station_id)
    {
        $station = $this->model->findOrFail($station_id);
        $station->delete();
    }

    public function searchByLocation(Request $request)
    {
        $city = $request->city;
        $district = $request->district;

        $query = $this->model->select("stations.*")->whereNull("stations.deleted_at");

        if ($city) {
            $query = $query->where("stations.city", $city);
        }

        if ($district) {
            $query = $query->where("stations.district", $district);
        }
        dd($query->get());
        $query = $query->leftJoin(
            "vehicles",
            "stations.id",
            "=",
            "vehicles.station_id"
        )
            ->leftJoin("vehicle_details", "vehicle_details.vehicle_id", "=", "vehicles.id")
            ->where("stations.status", ActivityStatus::ACTIVE->value)
            ->addSelect(
                "vehicle_details.*",
                "vehicles.id as vehicle_id"
            );
        dd($query->get());
        return $query->orderByDesc("stations.updated_at")->distinct()->get();
    }

    public function approveStation($id)
    {
        $this->update($id, ["status" => ActivityStatus::ACTIVE->value]);
    }
}
