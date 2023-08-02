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
            ->where("status", ActivityStatus::ACTIVE->value)
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

    public function approveStationOwner($id)
    {
        $stationOwner = $this->model->findOrFail($id);
        $admin = auth()->guard('admin')->user();
        try {
            $stationOwner->update([
                "status" => ActivityStatus::ACTIVE->value,
                "admin_id" => $admin->id,
            ]);
        } catch (Exception) {
            return back()->with(['error' => __("messages.update_data_failed")]);
        }
    }

    public function registerAccount($request)
    {
        try {
            $stationOwner = $this->model->create([
                "status" => ActivityStatus::REGISTER->value,
                "name" => $request->name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email_verified_at" => now(),
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
