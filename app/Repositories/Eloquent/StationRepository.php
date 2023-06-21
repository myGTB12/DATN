<?php

namespace App\Repositories\Eloquent;

use Exception;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StationRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Station::class;
    }

    public function getListStations()
    {
        $owner_id = auth()->guard('station_owner')->user()->id;
        $stations = $this->model->where('owner_id', $owner_id)->get()->all();
        return $stations;
    }

    public function createStation($request)
    {
        try {
            $station = $this->model->create([
                "name" => $request->name,
                "status" => $request->status,
                "owner_id" => $request->owner_id,
                "address" => $request->address,
                "mail_address" => $request->mail_address,
                "phone" => $request->phone,
                "start_business_time" => $request->start_business_time,
                "end_business_time" => $request->end_business_time,
                "maintenance_time" => $request->maintenance_time,
                "always_open" => $request->always_open,
            ]);
        } catch (Exception $e) {
            back()->with(['error' => __('messages.create_data_failed')]);
        }
        return $station;
    }

    public function editStation(Request $request)
    {
        if (!$request->always_open) {
            $request->merge(['always_open' => 0]);
        }
        if (!$request->status) {
            $request->merge(['status' => 0]);
        }
        try {
            $station = $this->getModel()::where('id', $request->id)->update([
                "name" => $request->name,
                "status" => $request->status,
                "address" => $request->address,
                "mail_address" => $request->mail_address,
                "phone" => $request->phone,
                "start_business_time" => $request->start_business_time,
                "end_business_time" => $request->end_business_time,
                "maintenance_time" => $request->maintenance_time,
                "always_open" => $request->always_open,
            ]);
        } catch (Exception $e) {
            dd($e);
            back()->with(['error' => __('messages.update_data_failed')]);
        }
    }

    public function showStation($station_id)
    {
        return $this->model->findOrFail($station_id);
    }

    public function deleteStation($station_id)
    {
        $station = $this->model->findOrFail($station_id);
        $station->delete();
    }
}
