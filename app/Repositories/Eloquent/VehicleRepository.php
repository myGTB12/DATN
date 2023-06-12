<?php

namespace App\Repositories\Eloquent;

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
        $vehicles = $this->model->vehicles;

        return $vehicles;
    }

    public function getAllVehicles()
    {
        $vehicles = Vehicle::all();
    }

    public function createVehicle($request)
    {
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
