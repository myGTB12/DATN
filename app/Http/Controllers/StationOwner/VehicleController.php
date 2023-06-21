<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\VehicleService;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    protected $vehicleService;
    protected $form;

    public function __construct(
        VehicleService $vehicleService,
        CustomValidator $form,
    ) {
        $this->vehicleService = $vehicleService;
        $this->form = $form;
    }

    public function index($id)
    {
        $vehicleDetails = $this->vehicleService->getListVehicles($id);
        $length = count($vehicleDetails);
        $midpoint = ceil($length / 2);

        $array1 = array_slice($vehicleDetails, 0, $midpoint);
        $array2 = array_slice($vehicleDetails, $midpoint);

        return view('content.user-interface.ui-carousel', compact('array1', 'array2'));
    }

    public function create(Request $request, $station_id)
    {
        if($request->isMethod("post")){
            $station = $this->vehicleService->createVehicle($request);
        }
        return view('content.form-elements.form-create-vehicle', compact('station_id'));
    }

    public function edit(Request $request)
    {
        // $this->form->validate($request, "CreateVehicleForm");
        $station = $this->vehicleService->editVehicle($request);
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
        if($result){
            return redirect()->route('vehicle.index', $station_id);
        }

        return view('contnent.pages.pages-misc-error');
    }
}
