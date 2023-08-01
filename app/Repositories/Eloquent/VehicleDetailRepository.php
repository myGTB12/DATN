<?php

namespace App\Repositories\Eloquent;

use Exception;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;
use App\Enums\ActivityStatus;

class VehicleDetailRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return VehicleDetail::class;
    }

    public function getVehicle($vehicle_id)
    {
        $query = $this->model->select("vehicle_details.*")->whereNull("vehicle_details.deleted_at")
            ->where('vehicle_id', $vehicle_id)->get();
        return $query;
    }

    public function serchByCarDetail(Request $request)
    {
        $brand = $request->brand;
        $name = $request->car_name;
        $capacity = $request->capacity;

        $query = $this->model->select("vehicle_details.*")->whereNull("vehicle_details.deleted_at");

        if ($brand) {
            $query = $query->where("vehicle_details.brand", "like", "%" . $brand . "%");
        }
        if ($name) {
            $query = $query->orWhere("vehicle_details.car_name", "like", "%" . $name . "%");
        };
        if ($capacity) {
            $query = $query->orWhere("vehicle_details.capacity", $capacity);
        }
        $query = $query->join(
            "vehicles",
            "vehicles.id",
            "=",
            "vehicle_details.vehicle_id"
        )
            ->join("stations", "stations.id", "=", "vehicles.station_id")
            ->where("stations.status", ActivityStatus::ACTIVE->value)
            ->addSelect(
                "stations.*",
                "vehicles.id",
            );

        return $query->orderByDesc("vehicle_details.updated_at")->get();
    }
}
