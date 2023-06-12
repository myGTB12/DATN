<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Models\Station;
use App\Services\StationService;

class StationController extends Controller
{
    protected $stationService;
    protected $form;

    public function __construct(
        StationService $stationService,
        CustomValidator $form,
    ) {
        $this->stationService = $stationService;
        $this->form = $form;
    }

    public function index()
    {
        if (!session()->get('station_owner')) {
            return back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $stations = $this->stationService->getListStations();
    }

    public function create(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $this->form->validate($request, "CreateStationForm");
        $station = $this->stationService->createStation($request);
    }

    public function edit(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $this->form->validate($request, "CreateStationForm");
        $station = $this->stationService->editStation($request);
    }

    public function show($station_id, $id)
    {
        if (!$this->validateOwner($id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->stationService->showStation($station_id);
    }

    public function delete($id, $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->stationService->deleteStation($id);
    }

    private function validateOwner($id)
    {
        if (!session()->get('admin') && auth()->guard('admin')->user()->id !== $id) {
            return false;
        }

        return true;
    }
}
