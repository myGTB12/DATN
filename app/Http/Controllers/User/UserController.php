<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\VehicleService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $vehicleService;
    protected $form;

    public function __construct(
        VehicleService $vehicleService,
        CustomValidator $form,
    ) {
        $this->vehicleService = $vehicleService;
        $this->form = $form;
    }

    public function home()
    {
        $vehicles = $this->vehicleService->getAvailableVehicle()->chunk(3);
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
