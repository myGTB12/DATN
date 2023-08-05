<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Models\Station;
use App\Services\StationService;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

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
        $station_owner = auth()->guard('station_owner')->user();
        $stations = $this->stationService->getListStations();

        return view('content.dashboard.dashboards-analytics', compact('station_owner', 'stations'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod("post")) {
            if (!$request->always_open) {
                $request->merge(['always_open' => 0]);
            }
            $this->form->validate($request, "CreateStationForm");
            $station = $this->stationService->createStation($request);

            return view("content.pages.pages-create-success");
        }

        return view("content.form-layout.form-create-station");
    }

    public function edit(Request $request, $id)
    {
        $station_owner = auth()->guard('station_owner')->user();
        if (!Helper::validateRole($request->id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $station = Station::findOrFail($id);
        if ($request->isMethod("post")) {
            $this->form->validate($request, "CreateStationForm");
            $this->stationService->editStation($request);
            $stations = $this->stationService->getListStations();
            return redirect()->route('stations.index', ['station_owner' => $station_owner, 'stations' => $stations])
                ->with("message", __('messages.success'));
        }

        return view("content.form-elements.form-edit-station", compact("station"));
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
