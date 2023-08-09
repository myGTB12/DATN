@extends('layouts/homeNavbarLayout')

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
                        <p class="mb-1">Station {{$data['station']['name']}},</p>
                        <p class="mb-1">{{$data['address']}},</p>
                        <p class="mb-0">Contact number: {{$data['station']['phone']}}</p>
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="me-1">Booking Date:</span>
                            <span class="fw-semibold">{{$data['start_time']}}</span>
                        </div>
                        <div>
                            <span class="me-1">Due Date:</span>
                            <span class="fw-semibold">{{$data['end_time']}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row p-sm-3 p-0">
                    <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                        <h6 class="pb-2">Customer:</h6>
                        <p class="mb-1">{{$data['user']['first_name'] . " " . $data['user']['last_name']}}</p>
                        <p class="mb-1">Create at: {{$data['created_at']}}</p>
                        @if($data['status'] == 0)
                        <p class="mb-1">Status: <span class="badge bg-label-secondary me-1">Canceled</span></p>
                        @elseif($data['status'] == 1)
                        <p class="mb-1">Status: <span class="badge bg-label-success me-1">Success</span></p>
                        @else
                        <p class="mb-1">Status: <span class="badge bg-label-warning me-1">Pending</span></p>
                        @endif
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                        <h6 class="pb-2">Bill To:</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-3">Total Due:</td>
                                    <td>${{$data['total_amount']}}</td>
                                </tr>
                                <tr>
                                    <td class="pe-3">Station name:</td>
                                    <td>{{$data['station']['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="pe-3">Address:</td>
                                    <td>{{$data['address']}}</td>
                                </tr>
                            </tbody>
                        </table>
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
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-nowrap">{{$data['details']['car_name']}}</td>
                            <td class="text-nowrap">{{$data['details']['brand']}}</td>
                            <td>${{$data['per_night_price']}}</td>
                            <td>${{$data['insurance_fee']}}</td>
                            <td>${{$data['usage_fee']}}</td>
                            <td>${{$data['total_amount']}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="align-top px-4 py-5">
                                <p class="mb-2">
                                    <span class="me-1 fw-semibold">Salesperson:</span>
                                    <span>{{$data['owner'][0]['name']}}</span>
                                </p>
                                <span>Thanks for your business. Safe drive and enjoy your trip</span>
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
                    <input type="text" readonly id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="{{$data['total_amount'] - $data['total_amount'] / 100}}">
                </div>
                <div class="input-group">
                    <img src="{{asset('assets/img/pages/qrcode.jpg')}}" height="500" width="350">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection