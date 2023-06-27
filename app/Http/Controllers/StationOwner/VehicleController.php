<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\VehicleService;
use App\Http\Controllers\Controller;
use App\Services\StationService;

class VehicleController extends Controller
{
    protected $vehicleService;
    protected $stationService;
    protected $form;

    public function __construct(
        VehicleService $vehicleService,
        StationService $stationService,
        CustomValidator $form,
    ) {
        $this->vehicleService = $vehicleService;
        $this->stationService = $stationService;
        $this->form = $form;
    }

    public function index($station_id)
    {
        $vehicleDetails = $this->vehicleService->getListVehicles($station_id);
        $length = count($vehicleDetails);
        $midpoint = ceil($length / 2);

        $array1 = array_slice($vehicleDetails, 0, $midpoint);
        $array2 = array_slice($vehicleDetails, $midpoint);

        return view('content.user-interface.ui-carousel', compact('array1', 'array2'));
    }

    public function create(Request $request, $station_id)
    {
        if($request->isMethod("post")){
            $station = $this->vehicleService->createVehicle($station_id, $request);

            return $this->index($station_id);
        }
        return view('content.form-elements.form-create-vehicle', compact('station_id'));
    }

    public function edit(Request $request, $station_id, $id)
    {
        // $this->form->validate($request, "CreateVehicleForm");
        $result = $this->vehicleService->editVehicle($request, $id);
        if($result){
            return redirect()->route('vehicle.index', $station_id);
        }
    }

    public function show($station_id, $id)
    {
        $vehicleDetail = $this->vehicleService->getVehicleDetail($id);
        $vehicle = $this->vehicleService->getVehicleByDetail($id);

        return view('content.form-elements.form-edit-vehicle', compact('vehicleDetail', 'vehicle', 'station_id'));
    }

    public function delete($station_id, $vehicle_id, Request $request)
    {
        $result = $this->vehicleService->deleteVehicle($vehicle_id, $request->vehicleDetail);
        if ($result) {
            return redirect()->route('vehicle.index', $station_id);
        }

        return view('contnent.pages.pages-misc-error');
    }

    public function searchByCar(Request $request)
    {
        $result = $this->vehicleService->searchByCar($request);

        return redirect()->route('home', true);
    }

    public function searchByStation(Request $request)
    {
        $result = $this->stationService->searchByStation($request);

        return redirect()->route('home', true);
    }
}
