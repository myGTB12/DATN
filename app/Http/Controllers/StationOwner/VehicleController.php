<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Helpers\Helper;
use App\Services\VehicleService;
use App\Http\Controllers\Controller;
use App\Services\StationService;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isEmpty;

class VehicleController extends Controller
{
    protected $vehicleService;
    protected $stationService;
    protected $form;

    public function __construct(
        VehicleService $vehicleService,
        StationService $stationService,
        CustomValidator $form,
    ) {
        $this->vehicleService = $vehicleService;
        $this->stationService = $stationService;
        $this->form = $form;
    }

    public function index($station_id)
    {
        $vehicleDetails = $this->vehicleService->getListVehicles($station_id);

        return view('content.user-interface.ui-cars-station', compact('vehicleDetails'));
    }

    public function create(Request $request, $station_id)
    {
        if ($request->isMethod("post")) {
            $vehicle = $this->vehicleService->createVehicle($station_id, $request);

            return $this->index($station_id);
        }
        return view('content.form-elements.form-create-vehicle', compact('station_id'));
    }

    public function edit(Request $request, $station_id, $id)
    {
        // $this->form->validate($request, "CreateVehicleForm");
        $result = $this->vehicleService->editVehicle($request, $id);
        if ($result) {
            return redirect()->route('vehicle.index', $station_id)->with("message", __('messages.success'));
        }
    }

    public function show($station_id, $id)
    {
        $vehicleDetail = $this->vehicleService->getVehicleDetail($id);
        $vehicle = $this->vehicleService->getVehicleByDetail($id);

        return view('content.form-elements.form-edit-vehicle', compact('vehicleDetail', 'vehicle', 'station_id'));
    }

    public function bookingShow($id)
    {
        $vehicle = $this->vehicleService->getVehicle($id);
        $station_owner = $vehicle->stations->stationOwner;
        $stations = $station_owner->stations;
        $address = [];
        foreach ($stations as $station) {
            $stationAddress = Helper::getStationAddress($station->district, $station->city);
            $address[$station->id] = $stationAddress;
        }
        $vehicleDetail = $this->vehicleService->getDetail($id)[0];
        $data = array_merge($station_owner->toArray(), $vehicleDetail);
        $data['address'] = $address;

        return view('content.form-elements.form-booking', compact('data', 'vehicle'));
    }

    public function delete($station_id, $vehicle_id, Request $request)
    {
        $result = $this->vehicleService->deleteVehicle($vehicle_id, $request->vehicleDetail);
        if ($result) {
            return redirect()->route('vehicle.index', $station_id)->with("message", __('messages.success'));
        }

        return view('contnent.pages.pages-misc-error');
    }

    public function searchByCar(Request $request)
    {
        $vehicles = $this->vehicleService->searchByCar($request);
        if ($vehicles->isEmpty()) {
            return redirect()->route('home')->with("message", __('messages.no_car_found'));
        }
        $vehicles = $vehicles->chunk(3);
        $vehicles_1 = $vehicles[0];
        $vehicles_2 = $vehicles[1];
        $vehicles_3 = $vehicles[2] ?? $vehicles[1];

        return view('content.user-interface.ui-home', [
            'vehicles_1' => $vehicles_1,
            'vehicles_2' => $vehicles_2,
            'vehicles_3' => $vehicles_3
        ]);
    }

    public function searchByStation(Request $request)
    {
        $vehicles = $this->stationService->searchByStation($request);
        if ($vehicles->isEmpty()) {
            return redirect()->route('home')->with("message", __('messages.no_car_found'));
        }
        $vehicles = $vehicles->chunk(3);

        $vehicles_1 = $vehicles[0];
        $vehicles_2 = $vehicles[1];
        $vehicles_3 = $vehicles[2];

        return view('content.user-interface.ui-home', [
            'vehicles_1' => $vehicles_1,
            'vehicles_2' => $vehicles_2,
            'vehicles_3' => $vehicles_3
        ]);
    }
}
