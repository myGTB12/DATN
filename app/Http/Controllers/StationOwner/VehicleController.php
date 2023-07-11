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

        return view('content.user-interface.ui-cars-station', compact('vehicleDetails'));
    }

    public function create(Request $request, $station_id)
    {
        if ($request->isMethod("post")) {
            $vehicle = $this->vehicleService->createVehicle($station_id, $request);

            return $this->index($station_id);
        }
        return view('content.form-elements.form-create-vehicle', compact('station_id'));
    }

    public function edit(Request $request, $station_id, $id)
    {
        // $this->form->validate($request, "CreateVehicleForm");
        $result = $this->vehicleService->editVehicle($request, $id);
        if ($result) {
            return redirect()->route('vehicle.index', $station_id);
        }
    }

    public function show($station_id, $id)
    {
        $vehicleDetail = $this->vehicleService->getVehicleDetail($id);
        $vehicle = $this->vehicleService->getVehicleByDetail($id);

        return view('content.form-elements.form-edit-vehicle', compact('vehicleDetail', 'vehicle', 'station_id'));
    }

    public function bookingShow($id)
    {
        $vehicle = $this->vehicleService->getVehicle($id);
        $vehicleDetail = $this->vehicleService->getDetail($id)[0];

        return view('content.form-elements.form-booking', compact('vehicleDetail', 'vehicle'));
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
        $vehicles = $this->vehicleService->searchByCar($request);
        if (!$vehicles) {
            return view('content.pages.pages-misc-error');
        }
        return view('content.user-interface.ui-home', ['vehicles' => $vehicles]);
    }

    public function searchByStation(Request $request)
    {
        $vehicles = $this->stationService->searchByStation($request);
        if (!$vehicles) {
            return view('content.pages.pages-misc-error');
        }
        return view('content.user-interface.ui-home', ['vehicles' => $vehicles]);
    }
}
