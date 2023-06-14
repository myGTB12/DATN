<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    protected $reservationService;
    protected $form;

    public function __construct(
        ReservationService $reservationService,
        CustomValidator $form,
    ) {
        $this->reservationService = $reservationService;
        $this->form = $form;
    }

    public function index()
    {
        if (!session()->get('station_owner')) {
            return back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $reservations = $this->reservationService->getListReservations();
    }

    public function create(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $this->form->validate($request, "CreateReservationForm");
        $reservation = $this->reservationService->createReservation($request);
    }

    public function edit(Request $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $this->form->validate($request, "CreateReservationForm");
        $reservation = $this->reservationService->editReservation($request);
    }

    public function show($reservation_id, $id)
    {
        if (!$this->validateOwner($id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $reservation = $this->reservationService->showReservation($reservation_id);
    }

    public function cancel($id, $request)
    {
        if (!$this->validateOwner($request->id)) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $reservation = $this->reservationService->cancelReservation($id);
    }

    private function validateOwner($id)
    {
        if (!session()->get('admin') && auth()->guard('admin')->user()->id !== $id) {
            return false;
        }

        return true;
    }
}
