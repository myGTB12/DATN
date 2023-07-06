<?php

namespace App\Repositories\Eloquent;

use App\Models\StationOwner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;

class StationOwnerRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return StationOwner::class;
    }

    public function checkOwner($request)
    {
        $model = $this->model
            ->where("email", ($request->email))
            ->whereNotNull("email_verified_at")
            ->first();
        if ($model && Hash::check($request->password, $model->password)) {
            return $model;
        }
        return;
    }

    public function getListStationOwner()
    {
        return $this->model->all();
    }

    public function editStationOwner($id, Request $editStationOwnerRequest)
    {
        $stationOwner = $this->model->findOrFail($id);
        try {
            $stationOwner->update($editStationOwnerRequest->all());
        } catch (Exception) {
            return back()->with(['error' => __("messages.update_data_failed")]);
        }
    }
}
