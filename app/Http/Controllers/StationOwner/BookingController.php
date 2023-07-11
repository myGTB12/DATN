<?php

namespace App\Http\Controllers\StationOwner;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Http\Controllers\Controller;
use App\Services\ReservationService;

class BookingController extends Controller
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
}
