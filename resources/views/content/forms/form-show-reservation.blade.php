@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Reservation/</span> Details</h4>

<!-- Basic Layout -->
<div class="row invoice-preview">
    <!-- Invoice -->
    <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
        <div class="card invoice-preview-card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                    <div class="mb-xl-0 mb-4">
                        <div class="d-flex svg-illustration mb-3 gap-2">
                            <span class="app-brand-logo demo">
                                <img class="border rounded" src="{{asset('assets/img/favicon/favicon.ico')}}" width="50" height="42">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">
                                Rental Car
                            </span>
                        </div>
                        <p class="mb-1">Station: {{$reservation->station_start_name}},</p>
                        <p class="mb-1">{{$reservation->address}},</p>
                        <p class="mb-0">Contact number: {{$reservation->phone}}</p>
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="me-1">Booking Date: {{$reservation->start_time}}</span>
                            <span class="fw-semibold"></span>
                        </div>
                        <div>
                            <span class="me-1">Date Due: {{$reservation->end_time}}</span>
                            <span class="fw-semibold"></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row p-sm-3 p-0">
                    <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                        <h6 class="pb-2">Customer: </h6>
                        <p class="mb-1">Name: {{$reservation->user_informations->first_name . ' ' . $reservation->user_informations->last_name}}</p>
                        <p class="mb-1">Contact number: {{$reservation->user_informations->phone}}</p>
                        <p class="mb-0">Email: {{$reservation->user_informations->email}}</p>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border-top m-0">
                    <thead>
                        <tr>
                            <th>Car name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Insurance Fee</th>
                            <th>Service Fee</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-nowrap">{{$reservation->car_name}}</td>
                            <td class="text-nowrap">{{$reservation->brand}}</td>
                            <td>{{$reservation->per_night_price}}</td>
                            <td>{{$reservation->insurance_fee}}</td>
                            <td>{{$reservation->usage_fee}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="align-top px-4 py-5">
                            </td>
                            <td class="text-end px-4 py-5">
                                <p class="mb-0">Tax (10%):</p>
                                <p class="mb-0">Total:</p>

                            </td>
                            <td class="px-4 py-5">
                                <p class="fw-semibold mb-2">{{$reservation->total_amount / 100}}</p>
                                <p class="fw-semibold mb-2">{{$reservation->total_amount - $reservation->total_amount / 100}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="align-top px-4 py-5"></td>
                            <td>
                                <form action="{{route('reservation.approve', $reservation->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success" name="status" value="1">Approve</button>
                                    <button type="submit" class="btn btn-warning" name="status" value="0">Reject</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Action -->
    <div class="col-xl-3 col-md-4 col-12 invoice-actions">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                    <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-dollar bx-xs me-1"></i>Payment</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Side bar -->
    <div class="offcanvas offcanvas-end show" id="addPaymentOffcanvas" aria-hidden="true" aria-modal="true" role="dialog">
        <div class="offcanvas-header mb-3">
            <h5 class="offcanvas-title">Payment</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <div class="mb-3">
                <label class="form-label" for="invoiceAmount">Payment Amount</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" readonly id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="{{$reservation->total_amount - $reservation->total_amount / 100}}">
                </div>
                <div class="input-group">
                    <img src="{{asset('assets/img/pages/qrcode.jpg')}}" height="500" width="350">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection