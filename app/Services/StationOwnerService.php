<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Form\EditStationOwnerForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationOwnerRepository;

class StationOwnerService
{
    protected StationOwnerRepository $stationOwnerRepository;

    public function __construct(StationOwnerRepository $stationOwnerRepository)
    {
        $this->stationOwnerRepository = $stationOwnerRepository;
    }

    public function getListStationOwner()
    {
        $stationOwners = $this->stationOwnerRepository->getListStationOwner();

        return $stationOwners;
    }

    public function editStationOwner($id, EditStationOwnerForm $editStationOwnerRequest)
    {
        $this->stationOwnerRepository->editStationOwner($id, $editStationOwnerRequest);
    }

    public function loginAccount(Request $request)
    {
        // Check info login
        $admin = $this->stationOwnerRepository->checkOwner($request);
        if (!$admin) {
            return __("messages.login_fail");
        }

        Auth::guard('station_owner')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return true;
    }
}
