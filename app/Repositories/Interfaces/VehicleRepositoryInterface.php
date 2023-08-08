<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface VehicleRepositoryInterface extends RepositoryInterface
{
    public function getListVehiclesAtStation();
    public function createVehicle(Request $request);
    public function editVehicle(Request $request);
    public function showVehicle($vehicle_id);
    public function deleteVehicle($vehicle_id);
}
