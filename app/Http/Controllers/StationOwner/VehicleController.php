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

        return view('content.user-interface.ui-carousel', compact('vehicleDetails'));
    }

    public function create(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $this->form->validate($request, "CreateVehicleForm");
        $station = $this->vehicleService->createVehicle($request);
    }

    public function edit(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $this->form->validate($request, "CreateVehicleForm");
        $station = $this->vehicleService->editVehicle($request);
    }

    public function show($station_id, $id)
    {
        if (!$this->validateOwner($id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->vehicleService->showVehicle($station_id);
    }

    public function delete($id, $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->vehicleService->deleteVehicle($id);
    }

    private function validateOwner($id)
    {
        if (!session()->get('admin') && auth()->guard('admin')->user()->id !== $id) {
            return false;
        }

        return true;
    }
}
