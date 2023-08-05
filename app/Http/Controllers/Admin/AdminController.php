<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ActivityStatus;
use App\Helpers\Helper;
use App\Models\StationOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StationOwnerService;
use App\Form\CustomValidator;
use App\Models\Station;
use App\Services\StationService;
use App\Services\VoucherService;

class AdminController extends Controller
{
    protected $stationOwnerService;
    protected $stationService;
    protected $voucherService;
    protected $form;

    public function __construct(
        StationOwnerService $stationOwnerService,
        StationService $stationService,
        VoucherService $voucherService,
        CustomValidator $form,
    ) {
        $this->stationOwnerService = $stationOwnerService;
        $this->stationService = $stationService;
        $this->voucherService = $voucherService;
        $this->form = $form;
    }

    public function getListStationOwner()
    {
        if (session()->get('admin')) {
            $stationOwners = $this->stationOwnerService->getListStationOwner();

            return view('content.tables.station-owner-tables', compact('stationOwners'));
        } else {
            return back()->with(['error' => __('messages.not_admin')]);
        }
    }

    public function editStationOwner($id, Request $request)
    {
        if ($request->isMethod("post")) {
            if (!$request->status) {
                $request->merge(['status' => ActivityStatus::INACTIVE->value]);
            }
            if ($request->status == ActivityStatus::REGISTER->value) {
                $this->stationOwnerService->approveStationOwner($id);

                return redirect()->route('users.list')->with("message", __('messages.approve_station_owner'));
            }

            $this->form->validate($request, "EditStationOwnerForm");
            if (session()->get('admin')) {
                $this->stationOwnerService->editStationOwner($id, $request);
                return redirect()->route('users.list')->with("message", __('messages.success'));
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

        return view('content.form-elements.form-edit-station-owner', compact('stationOwner'));
    }

    public function approveRequest(Request $request)
    {
        $stations = $this->stationService->getListStations(true);

        return view('content.tables.stations-register', compact('stations'));
    }

    public function deleteStationOwner($id)
    {
        $this->stationOwnerService->delete($id);

        return $this->getListStationOwner();
    }

    public function approveStation(Request $request, $id)
    {
        if ($request->isMethod("POST")) {
            $this->stationService->approveStation($id);

            return redirect()->route("station.request")->with("success", __("messages.station_approved"));
        }
        $station = Station::find($id);

        return view("content.form-elements.form-approve-station", compact("station"));
    }

    public function addVoucher(Request $request)
    {
        if ($request->isMethod("POST")) {
            $this->voucherService->addVoucher($request);

            return redirect()->route("users.list")->with("message", __("messages.add_voucher"));
        }

        return view('content.form-layout.form-create-voucher');
    }
}
