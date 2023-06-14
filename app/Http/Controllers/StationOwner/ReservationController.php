<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\ReservationService;
use App\Helpers\Helper;

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
        if (!Helper::validateRole($request->id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }
        $this->form->validate($request, "CreateReservationForm");
        $reservation = $this->reservationService->createReservation($request);
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
