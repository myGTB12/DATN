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

    public function createVehicle($request, $station_id)
    {
        try {
            $vehicle = $this->vehicleRepository->create([
                "station_id" => $station_id,
                "status" => $request->status,
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
                    "booking_status" => 0,
                ]);
            }
        } catch (Exception $e) {
            back()->with(['error' => __('messages.create_data_failed')]);
        }

        return ['vehicle' => $vehicle, 'vehicle_details' => $vehicleDetail];
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
