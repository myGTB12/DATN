<?php

namespace App\Services;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\StationRepository;

class StationService
{
    protected StationRepository $stationRepository;

    public function __construct(StationRepository $stationRepository)
    {
        $this->stationRepository = $stationRepository;
    }

    public function getListStations()
    {
        $stations = $this->stationRepository->getListStations();

        return $stations;
    }

    public function createStation($request)
    {
        $station = $this->stationRepository->createStation($request);
        return $station;
    }

    public function editStation(Request $request)
    {
        $station = $this->validateStation($request->id);
        if ($station) {
            $station = $this->stationRepository->createStation($request);
            return $station;
        }
        return;
    }

    public function showStation($station_id)
    {
        return $this->stationRepository->showStation($station_id);
    }

    public function deleteStation($station_id)
    {
        $station = $this->stationRepository->deleteStation($station_id);
    }

    private function validateStation($id)
    {
        $station = Station::findOrFail($id);
        return $station;
    }
}
