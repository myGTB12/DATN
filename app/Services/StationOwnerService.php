<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
}
