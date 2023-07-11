<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\ReservationService;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Services\VehicleService;

class ReservationController extends Controller
{
    protected $reservationService;
    protected $vehicleService;
    protected $form;

    public function __construct(
        ReservationService $reservationService,
        VehicleService $vehicleService,
        CustomValidator $form,
    ) {
        $this->reservationService = $reservationService;
        $this->form = $form;
        $this->vehicleService = $vehicleService;
    }

    public function bookingDetails(Request $request, $vehicle_id)
    {
        
    }

    public function index()
    {
        $user_id = auth()->guard('station_owner')->user()->id;
        $reservations = $this->reservationService->getListReservations($user_id);

        return view('content.tables.reservations-table', compact('reservations'));
    }

    // public function create($user_id, Request $request)
    public function create()
    {
        // if ($request->isMethod('POST')) {
        //     $this->form->validate($request, "CreateReservationForm");
        // }

        return view('content.form-elements.form-create-reservation');
    }

    public function edit(Request $request)
    {
        if (!Helper::validateRole($request->id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $this->form->validate($request, "CreateReservationForm");
        $reservation = $this->reservationService->editReservation($request);
    }

    public function show($reservation_id, $id)
    {
        if (!Helper::validateRole($id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $reservation = $this->reservationService->showReservation($reservation_id);
    }

    public function cancel($id, $request)
    {
        if (!Helper::validateRole($request->id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $reservation = $this->reservationService->cancelReservation($id);
    }
}
