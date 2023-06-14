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

    public function getListStationOwner() {
        if(session()->get('admin')){
            $this->stationOwnerService->getListStationOwner();
            return view('content.cards.cards-basic');
        } else {
            return back()->with(['error' => __('messages.not_admin')]);
        }
    }
}
