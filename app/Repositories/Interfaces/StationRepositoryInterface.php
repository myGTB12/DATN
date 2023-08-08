<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface StationRepositoryInterface extends RepositoryInterface
{
    public function getListStations($status = null);
    public function createStation(Request $request);
    public function editStation(Request $request);
    public function showStation($station_id);
    public function deleteStation($station_id);
    public function searchByLocation(Request $request);
    public function approveStation($id);
}
