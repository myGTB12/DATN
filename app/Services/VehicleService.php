<?php

namespace App\Services;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\VehicleRepository;

class VehicleService
{
    protected VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getListVehicles()
    {
        $stations = $this->vehicleRepository->getListVehiclesAtStation();

        return $stations;
    }

    public function createVehicle($request)
    {
        $station = $this->vehicleRepository->createVehicle($request);
        return $station;
    }

    public function editVehicle(Request $request)
    {
        $station = $this->validateVehicle($request->id);
        if ($station) {
            $station = $this->vehicleRepository->createVehicle($request);
            return $station;
        }
        return;
    }

    public function showVehicle($station_id)
    {
        return $this->vehicleRepository->showVehicle($station_id);
    }

    public function deleteVehicle($station_id)
    {
        $station = $this->vehicleRepository->deleteVehicle($station_id);
    }

    private function validateVehicle($id)
    {
        $station = Vehicle::findOrFail($id);
        return $station;
    }
}
