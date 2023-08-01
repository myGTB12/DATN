<?php

namespace App\Services;

use Exception;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationRepository;
use App\Repositories\Eloquent\VehicleRepository;
use App\Repositories\Eloquent\VehicleDetailRepository;
use Illuminate\Support\Facades\Storage;
use App\Traits\Pagination;

class VehicleService
{
    use Pagination;

    protected VehicleRepository $vehicleRepository;
    protected VehicleDetailRepository $vehicleDetailRepository;
    protected StationRepository $stationRepository;
    private $PAGINATION = 9;

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

    public function getVehicle($id)
    {
        return $this->vehicleRepository->find($id);
    }

    public function getDetail($id)
    {
        return $this->vehicleDetailRepository->findBy(['vehicle_id' => $id]);
    }

    public function createVehicle($station_id, $request)
    {
        try {
            $vehicle = $this->vehicleRepository->create([
                "station_id" => $station_id,
                "vehicle_inspection_exp_date" => $request->vehicle_inspection_exp_date,
            ]);
            if ($vehicle) {
                if ($request->file('img2')) {
                    $file = $request->file('img2');
                    $file_path = env('STORAGE_PATH');
                    $file_name = $vehicle->id . '.' . $file->getClientOriginalExtension();
                    Storage::disk('public')->putFileAs("img", $file, $file_name);
                }

                $vehicleDetail = $this->vehicleDetailRepository->create([
                    "vehicle_id" => $vehicle->id,
                    "img" => $request->img,
                    "img2" => $file_path . $file_name,
                    "img3" => $request->img3,
                    "img4" => $request->img4,
                    "fuel" => $request->fuel,
                    "vehicle_number" => $request->vehicle_number,
                    "per_night_price" => $request->per_night_price,
                    "over_time_price" => $request->over_time_price,
                    "color" => $request->color,
                    "brand" => $request->brand,
                    "car_name" => $request->car_name,
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
        $vehicle = $this->vehicleDetailRepository->find($vehicle_detail_id);
        if (!$vehicle) {
            return null;
        }

        return $this->vehicleRepository->find($vehicle->vehicle_id);
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

    public function getAvailableVehicle()
    {
        $data = $this->vehicleRepository->getListVehiclesAtStation();
        $pagination = $this->pagination($data, $this->PAGINATION);

        return $pagination;
    }

    public function searchByCar($request)
    {
        $vehicles = $this->vehicleDetailRepository->serchByCarDetail($request);

        return $vehicles->toArray();
    }
}
