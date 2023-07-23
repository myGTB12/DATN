<?php

namespace App\Repositories\Eloquent;

use App\Enums\ActivityStatus;
use App\Models\StationOwner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

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

    public function getListStationOwner($status)
    {
        if (!$status) {
            return $this->model->all();
        }

        return $this->model->all()->where("status", $status);
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

    public function registerAccount($request)
    {
        try {
            $stationOwner = $this->model->create([
                "status" => ActivityStatus::REGISTER->value,
                "admin_id" => $request->admin_id,
                "name" => $request->name,
                "company_name" => $request->company_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "password" => Hash::make($request->password),
            ]);
            return $stationOwner;
        } catch (Exception $e) {
            Log::info($e);
            return redirect()->route('station.register')->with('error', __('messages.create_data_failed'));
        }
    }
}
