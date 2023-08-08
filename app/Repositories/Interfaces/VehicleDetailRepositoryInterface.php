<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface VehicleDetailRepositoryInterface extends RepositoryInterface
{
    public function getVehicle($vehicle_id);
    public function searchByStation(Request $request);
    public function serchByCarDetail(Request $request);
}
