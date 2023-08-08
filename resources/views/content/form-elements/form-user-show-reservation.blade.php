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
                        <p class="mb-1">Station ,</p>
                        <p class="mb-1">,</p>
                        <p class="mb-0">Contact number: </p>
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="me-1">Booking Date:</span>
                            <span class="fw-semibold"></span>
                        </div>
                        <div>
                            <span class="me-1">Due Date:</span>
                            <span class="fw-semibold"></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row p-sm-3 p-0">
                    <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                        <h6 class="pb-2">Customer:</h6>
                        <p class="mb-1"></p>
                        <p class="mb-1"></p>
                        <p class="mb-0"></p>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                        <h6 class="pb-2">Bill To:</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-3">Total Due:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="pe-3">Station name:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="pe-3">Address:</td>
                                    <td></td>
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
                            <td class="text-nowrap"></td>
                            <td class="text-nowrap"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="align-top px-4 py-5">
                                <p class="mb-2">
                                    <span class="me-1 fw-semibold">Salesperson:</span>
                                    <span></span>
                                </p>
                                <span>Thanks for your business. Safe drive and enjoy your trip</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection