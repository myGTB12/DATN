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

    public function index()
    {
        $reservations = $this->reservationService->getListReservations();

        return view('content.tables.reservations-table', compact('reservations'));
    }

    public function create(Request $request, $vehicle_detail_id)
    {
        $data = $this->reservationService->createReservation($vehicle_detail_id, $request);

        if ($data) {
            return redirect()->route('reservation.preview', [$data->id])->with("message", __('messages.reservation_created'));
        }

        return view("content.pages.pages-misc-error");
    }

    public function approve(Request $request, $id)
    {
        $this->reservationService->approve($request, $id);

        return redirect()->route('booking.index')->with("message", __('messages.reservation_approved'));
    }

    public function show(Request $request, $reservation_id)
    {
        $reservation = $this->reservationService->showReservation($request, $reservation_id);
        if ($request->isMethod("POST")) {
        }

        return view('content.form-elements.form-show-reservation', compact('reservation'));
    }

    public function cancel($id, $request)
    {
        if (!Helper::validateRole($request->id, 'station_owner')) {
            back()->with(['error' => __('messages.station_owners_fail')]);
        }

        $reservation = $this->reservationService->cancelReservation($id);
    }

    public function preview($id)
    {
        $data = $this->reservationService->previewReservation($id);

        return view("content.form-elements.form-reservation-success", compact('data'));
    }
}
