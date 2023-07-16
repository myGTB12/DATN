<?php

namespace App\Repositories\Eloquent;

use Exception;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;

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

    public function serchByCarDetail($request)
    {
        $brand = $request->brand;
        $name = $request->name;
        $capacity = $request->capacity;

        $query = $this->model->select("vehicle_details.*")->whereNull("vehicle_details.deleted_at");

        if ($brand) {
            $query = $query->where("vehicle_details.brand", "like", "%" . $brand . "%");
        }
        if ($name) {
            $query = $query->orWhere("vehicle_details.name", "like", "%" . $name . "%");
        };
        if ($capacity) {
            $query = $query->orWhere("vehicle_details.capacity", $capacity);
        }

        return $query->orderByDesc("vehicle_details.updated_at")->get();
    }
}
