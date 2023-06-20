<?php

namespace App\Services;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationRepository;
use App\Repositories\Eloquent\VehicleRepository;

class VehicleService
{
    protected VehicleRepository $vehicleRepository;
    protected StationRepository $stationRepository;

    public function __construct(
        VehicleRepository $vehicleRepository,
        StationRepository $stationRepository
    )
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->stationRepository = $stationRepository;
    }

    public function getListVehicles($id)
    {
        $station = $this->stationRepository->find($id);
        $vehicleDetails = $station->vehicles->pluck('vehicleDetail')->all();
        // $vehicleDetails = $this->getVehicleDetails($vehicles);

        return $vehicleDetails;
    }

    public function createVehicle($request)
    {
        // try {
        //     $vehicle = $this->model->create([
        //         "name" => $request->name,
        //         "status" => $request->status,
        //         "owner_id" => $request->owner_id,
        //         "address" => $request->address,
        //         "mail_address" => $request->mail_address,
        //         "phone" => $request->phone,
        //         "start_business_time" => $request->start_business_time,
        //         "end_business_time" => $request->end_business_time,
        //         "maintenance_time" => $request->maintenance_time,
        //         "always_open" => $request->always_open,
        //     ]);
        // } catch (Exception $e) {
        //     back()->with(['error' => __('messages.create_data_failed')]);
        // }
        // return $vehicle;
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
    }

    public function deleteVehicle($vehicle_id)
    {
    }

    private function validateVehicle($id)
    {
        $station = Vehicle::findOrFail($id);
        return $station;
    }
}
