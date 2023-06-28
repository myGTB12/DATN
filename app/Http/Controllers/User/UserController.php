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

    public function home(){        
        $vehicles = $this->vehicleService->getAvailableVehicle();
        $cities = __('city');

        return view('content.user-interface.ui-home', ['vehicles' => $vehicles, 'cities' => $cities]);
    }
}
