<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\StationOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StationOwnerService;
use App\Form\CustomValidator;
use App\Services\StationService;

class AdminController extends Controller
{
    protected $stationOwnerService;
    protected $stationService;
    protected $form;

    public function __construct(
        StationOwnerService $stationOwnerService,
        StationService $stationService,
        CustomValidator $form,
    ) {
        $this->stationOwnerService = $stationOwnerService;
        $this->stationService = $stationService;
        $this->form = $form;
    }

    public function getListStationOwner()
    {
        if (session()->get('admin')) {
            $stationOwners = $this->stationOwnerService->getListStationOwner();

            return view('content.tables.tables-basic', compact('stationOwners'));
        } else {
            return back()->with(['error' => __('messages.not_admin')]);
        }
    }

    public function editStationOwner($id, Request $request){
        if($request->isMethod("post")){
            $this->form->validate($request, "EditStationOwnerForm");
            if (session()->get('admin')) {
                $this->stationOwnerService->editStationOwner($id, $request);
                return $this->getListStationOwner();
            } else {
                return back()->with(['error' => __('messages.not_admin')]);
            }
        }

        $stationOwner = StationOwner::findOrFail($id);
        $stations = $stationOwner->stations;
        $vehicles = $this->stationService->getVehiclesOfOwner($stations);
        $data = [
            'number_of_stations' => count($stations),
            'number_vehicles' => count($vehicles),
        ];
        return view('content.form-layout.form-layouts-vertical', compact('data', 'stationOwner'));
    }
}
