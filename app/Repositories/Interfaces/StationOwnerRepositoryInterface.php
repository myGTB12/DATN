<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface StationOwnerRepositoryInterface extends RepositoryInterface
{
    public function checkOwner($request);
    public function getListStationOwner($status);
    public function editStationOwner($id, Request $editStationOwnerRequest);
    public function approveStationOwner($id);
    public function registerAccount(Request $request);
}
