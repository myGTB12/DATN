<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\VehicleService;
use App\Http\Controllers\Controller;
use App\Services\ReservationService;
use App\Services\VoucherService;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    protected $vehicleService;
    protected $voucherService;
    protected $reservationService;
    protected $form;

    public function __construct(
        VehicleService $vehicleService,
        VoucherService $voucherService,
        ReservationService $reservationService,
        CustomValidator $form,
    ) {
        $this->vehicleService = $vehicleService;
        $this->voucherService = $voucherService;
        $this->reservationService = $reservationService;
        $this->form = $form;
    }

    public function home()
    {
        $vehicles = $this->vehicleService->getAvailableVehicle()->chunk(3);
        if (Cache::get('vouchers')) {
            $vouchers = Cache::get('vouchers');
        } else {
            $vouchers = $this->voucherService->getAvailablevouchers();
            Cache::put('vouchers', $vouchers);
        }
        $vehicles_1 = $vehicles[0];
        $vehicles_2 = $vehicles[1];
        $vehicles_3 = $vehicles[2];

        return view('content.user-interface.ui-home', [
            'vehicles_1' => $vehicles_1,
            'vehicles_2' => $vehicles_2,
            'vehicles_3' => $vehicles_3,
            'vouchers' => $vouchers
        ]);
    }

    public function reservations($id)
    {
        $reservations = $this->reservationService->userReservations($id);

        return view('content.form-elements.form-user-show-reservations', compact('reservations'));
    }

    public function myReservation(Request $request, $id, $res_id)
    {
        $data = $this->reservationService->previewReservation($res_id);

        return view('content.form-elements.form-user-show-reservation', compact('data'));
    }
}
