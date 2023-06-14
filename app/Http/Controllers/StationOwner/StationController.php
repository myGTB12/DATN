<?php

namespace App\Http\Controllers\StationOwner;

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
        if (!Helper::validateRole($request->id, 'admin')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $this->form->validate($request, "CreateStationForm");
        $station = $this->stationService->createStation($request);
    }

    public function edit(Request $request)
    {
        if (!Helper::validateRole($request->id, 'admin')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $this->form->validate($request, "CreateStationForm");
        $station = $this->stationService->editStation($request);
    }

    public function show($station_id, $id)
    {
        if (!Helper::validateRole($id, 'admin')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->stationService->showStation($station_id);
    }

    public function delete($id, $request)
    {
        if (!Helper::validateRole($request->id, 'admin')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $station = $this->stationService->deleteStation($id);
    }
}
