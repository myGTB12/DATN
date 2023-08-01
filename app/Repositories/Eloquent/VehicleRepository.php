<?php

namespace App\Repositories\Eloquent;

use App\Enums\ActivityStatus;
use Exception;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Vehicle::class;
    }

    public function getListVehiclesAtStation()
    {
        $vehicles = $this->model->select(
            "vehicle_details.*",
            "vehicles.id",
            "stations.city",
            "stations.district",
        )
            ->join(
                "vehicle_details",
                "vehicle_details.vehicle_id",
                "=",
                "vehicles.id"
            )
            ->join("stations", "stations.id", "=", "vehicles.station_id")
            ->where("vehicles.status", ActivityStatus::ACTIVE->value)
            ->where("vehicles.status", ActivityStatus::ACTIVE->value);

        return $vehicles->whereNull("vehicles.deleted_at")
            ->distinct()->get();
    }

    public function createVehicle($request)
    {
        dd($request->all());
        try {
            $vehicle = $this->model->create([
                "name" => $request->name,
                "status" => $request->status,
                "owner_id" => $request->owner_id,
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
        return $vehicle;
    }

    public function editVehicle(Request $request)
    {
        $vehicle = $this->validateVehicle($request->id);
        try {
            $vehicle = $vehicle::update([
                "name" => $request->name,
                "status" => $request->status,
                "owner_id" => $request->owner_id,
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
        return $vehicle;
    }

    public function showVehicle($vehicle_id)
    {
        return $this->model->findOrFail($vehicle_id);
    }

    public function deleteVehicle($vehicle_id)
    {
        $vehicle = $this->model->findOrFail($vehicle_id);
        $vehicle->delete();
    }

    private function validateVehicle($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return $vehicle;
    }
}
