@extends('layouts/homeNavbarLayout')

@section('title', __('messages.title'))

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')

<div class="card-group mb-5">
    <div class="card">
        <img class="card-img-top" style="border-bottom: 15px;" src="https://n1-pstg.mioto.vn/cho_thue_xe_o_to_tu_lai_thue_xe_du_lich_hochiminh/honda_city_2014/p/g/2023/02/14/11/RCgvvfpmEbCdw-8b256hqg.jpg" alt="Card image cap">
    </div>
    <div class="card">
        <img class="card-img-top" src="https://n1-pstg.mioto.vn/cho_thue_xe_o_to_tu_lai_thue_xe_du_lich_hochiminh/honda_city_2014/p/g/2023/02/14/11/5nA4ydgf0sL1f-tmA9qjfg.jpg" alt="Card image cap">
    </div>
    <div class="card">
        <img class="card-img-top" src="https://n1-pstg.mioto.vn/cho_thue_xe_o_to_tu_lai_thue_xe_du_lich_hochiminh/honda_city_2014/p/g/2023/01/28/09/5Z5ktARk40ppMcRlNGHvIQ.jpg" alt="Card image cap">
    </div>
    <div class="card">
        <img class="card-img-top" src="https://n1-pstg.mioto.vn/cho_thue_xe_o_to_tu_lai_thue_xe_du_lich_hochiminh/honda_city_2014/p/g/2023/01/28/12/xvXmTPMIbOA7KzB1oBX2wA.jpg" alt="Card image cap">
    </div>
</div>
<div class="divider">
    <div class="divider-text">Rental Cars</div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <form style="width: 100%;" class="col-md-8" action="" method="POST">
            @csrf
            <div class="card mb-6 full-width">
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" name="brand" class="form-control" value="{{$vehicleDetail['brand']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$vehicleDetail['name']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Vehicle number</label>
                            <div class="col-sm-10">
                                <input type="text" name="vehicle_number" class="form-control" value="{{$vehicleDetail['vehicle_number']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <input type="text" name="color" value="{{$vehicleDetail['color']}}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Capacity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="capacity" value="{{$vehicleDetail['capacity']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Length (m)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="length" value="{{$vehicleDetail['length']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Width (m)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="width" value="{{$vehicleDetail['width']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Height (kg)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="height" value="{{$vehicleDetail['height']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Per night price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="per_night_price" value="{{$vehicleDetail['per_night_price']}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Over time price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit_over_time_price" value="{{$vehicleDetail['unit_over_time_price']}}" />
                            </div>
                        </div>
                        <div class="divider divider-primary">
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Rent <i class='bx bxl-audible'></i></button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transactions</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Paypal</small>
                                <h6 class="mb-0">Send money</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+82.6</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Wallet</small>
                                <h6 class="mb-0">Mac'D</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+270.69</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Transfer</small>
                                <h6 class="mb-0">Refund</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+637.91</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Credit Card</small>
                                <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">-838.71</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Wallet</small>
                                <h6 class="mb-0">Starbucks</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">+203.33</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{asset('assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Mastercard</small>
                                <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">-92.45</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection