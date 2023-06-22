<?php

namespace App\Services;

use Exception;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationRepository;
use App\Repositories\Eloquent\VehicleRepository;
use App\Repositories\Eloquent\VehicleDetailRepository;

class VehicleService
{
    protected VehicleRepository $vehicleRepository;
    protected VehicleDetailRepository $vehicleDetailRepository;
    protected StationRepository $stationRepository;

    public function __construct(
        VehicleRepository $vehicleRepository,
        StationRepository $stationRepository,
        VehicleDetailRepository $vehicleDetailRepository,
    ) {
        $this->vehicleRepository = $vehicleRepository;
        $this->stationRepository = $stationRepository;
        $this->vehicleDetailRepository = $vehicleDetailRepository;
    }

    public function getListVehicles($id)
    {
        $station = $this->stationRepository->find($id);
        $vehicleDetails = $station->vehicles->pluck('vehicleDetail')->all();
        // $vehicleDetails = $this->getVehicleDetails($vehicles);

        return $vehicleDetails;
    }

    public function createVehicle($station_id, $request)
    {
        try {
            $vehicle = $this->vehicleRepository->create([
                "station_id" => $station_id,
                "vehicle_inspection_exp_date" => $request->vehicle_inspection_exp_date,
            ]);
            if ($vehicle) {
                $vehicleDetail = $this->vehicleDetailRepository->create([
                    "vehicle_id" => $vehicle->id,
                    "img" => $request->img,
                    "img2" => $request->img2,
                    "img3" => $request->img3,
                    "img4" => $request->img4,
                    "fuel" => $request->fuel,
                    "vehicle_number" => $request->vehicle_number,
                    "color" => $request->color,
                    "brand" => $request->brand,
                    "name" => $request->name,
                    "capacity" => $request->capacity,
                ]);
            }
            
            return ['vehicle' => $vehicle, 'vehicle_details' => $vehicleDetail];
        } catch (Exception $e) {
            back()->with(['error' => __('messages.create_data_failed')]);
        }
    }

    public function editVehicle(Request $request, $id)
    {
        try {
            $vehicle_id = $this->vehicleDetailRepository->find($id)->vehicle_id;

            $vehicle = $this->vehicleRepository->update($vehicle_id, [
                "vehicle_inspection_exp_date" => $request->vehicle_inspection_exp_date,
                // "status" => $request->status,
            ]);

            $vehicleDetail = $this->vehicleDetailRepository->update($id, [
                "img" => $request->img,
                "img2" => $request->img2,
                "img3" => $request->img3,
                "img4" => $request->img4,
                "fuel" => $request->fuel,
                "vehicle_number" => $request->vehicle,
                "color" => $request->color,
                "brand" => $request->brand,
                "name" => $request->name,
                "capacity" => $request->capacity,
                "booking_start" => $request->booking_start,
                "booking_end" => $request->booking_end,
            ]);

            return ['vehicle' => $vehicle, 'vehicleDetails' => $vehicleDetail];
        } catch (Exception $e) {
            back()->with(['error' => __('messages.update_data_failed')]);
        }
    }

    public function getVehicleDetail($id)
    {
        $vehicleDetail = $this->vehicleDetailRepository->find($id);

        return $vehicleDetail;
    }

    public function getVehicleByDetail($vehicle_detail_id)
    {
        $vehicle_id = $this->vehicleDetailRepository->find($vehicle_detail_id)->vehicle_id;

        return $this->vehicleRepository->find($vehicle_id);
    }

    public function deleteVehicle($vehicle_id, $vehicle_detail_id)
    {
        try {
            $this->vehicleRepository->delete($vehicle_id);
            $this->vehicleDetailRepository->delete($vehicle_detail_id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function validateVehicle($id)
    {
        $station = Vehicle::findOrFail($id);
        return $station;
    }
}
