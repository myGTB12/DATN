<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StationOwnerService;

class AdminController extends Controller
{
    protected $stationOwnerService;
    protected $form;

    public function __construct(
        StationOwnerService $stationOwnerService,
        // CustomValidator $form,
    ) {
        $this->stationOwnerService = $stationOwnerService;
        // $this->form = $form;
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
}
