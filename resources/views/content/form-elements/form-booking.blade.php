@extends('layouts/homeNavbarLayout')

@section('title', __('messages.title'))

@section('page-script')
<script src="{{asset('assets/js/booking-offer.js')}}"></script>
@endsection

@section('content')

<div class="card-group mb-5" style="border: 1px solid #000; border-radius: 10px;">
    <div class="card">
        <img class="card-img-top" style="border-right: 1px solid #000;" src="{{asset($data['img'])}}">
    </div>
    <div class="card">
        <img class="card-img-top" style="border-right: 1px solid #000;" src="{{asset($data['img2'])}}">
    </div>
    <div class="card">
        <img class="card-img-top" style="border-right: 1px solid #000;" src="{{asset($data['img3'])}}">
    </div>
    <div class="card">
        <img class="card-img-top" style="border-right: 1px solid #000;" src="{{asset($data['img4'])}}">
    </div>
</div>
<div class="divider">
    <div class="divider-text">Rental Cars</div>
</div>
<div class="row">
    <!-- Cart left -->
    <div class="col-xl-8 mb-3 mb-xl-0">

        <!-- Offer alert -->
        <div class="alert alert-success mb-4" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0">
                    <span class="badge badge-center rounded-pill bg-success border-label-success p-3 me-2">
                        <i class="bx bx-sm bx-purchase-tag fs-4"></i>
                    </span>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-bold">Available Offers</div>
                    <ul class="list-unstyled mb-0">
                        <li> - 10% Instant Discount on Bank of America Corp Bank Debit and Credit cards</li>
                        <li> - 25% Cashback Voucher of up to $60 on first ever PayPal transaction. TCA</li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Shopping bag -->
        <h5>Booking details</h5>
        <ul class="list-group mb-3">
            <li class="list-group-item p-4">
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <img src="{{asset($data['img'])}}" alt="google home" class="w-px-100">
                    </div>
                    <div class="flex-grow-1">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="me-3"><a href="" class="text-body">{{$data['name']}}</a></h6>
                                <div class="text-muted mb-1 d-flex flex-wrap" style="padding-bottom: 10px;"><span class="me-1">Owner:</span> <a href="" class="me-1">{{$data['name']}}</a> <span class="badge bg-label-success">In Stock</span></div>
                                <div class="car-outstanding">
                                    <div class="outstanding-features__item">
                                        <div class="wrap-svg"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.914 23.3289C10.9148 23.3284 10.9156 23.3279 10.9163 23.3274C10.9155 23.3279 10.9148 23.3284 10.914 23.3289ZM10.914 23.3289C10.914 23.3289 10.914 23.3289 10.914 23.3289L11.3128 23.9114M10.914 23.3289L11.3128 23.9114M11.3128 23.9114L10.9807 23.2882L20.6697 23.9458C20.6682 23.9484 20.6656 23.9496 20.6631 23.9479C20.655 23.9424 20.6343 23.9284 20.6014 23.9074C20.6014 23.9073 20.6014 23.9073 20.6013 23.9073C20.5141 23.8516 20.3413 23.7468 20.0921 23.6208C20.0919 23.6207 20.0918 23.6206 20.0917 23.6206C19.3397 23.2404 17.8926 22.6674 16.0003 22.6674C14.1715 22.6674 12.7584 23.2026 11.9869 23.5817L11.9929 23.5929M11.3128 23.9114L11.331 23.9456C11.3324 23.9483 11.3352 23.9495 11.3377 23.9478C11.3444 23.9432 11.3592 23.9332 11.3821 23.9184L11.9929 23.5929L11.9929 23.5929M11.9929 23.5929C11.9909 23.5892 11.9889 23.5855 11.9868 23.5818C11.6767 23.7342 11.4702 23.8614 11.3821 23.9184L11.9929 23.5929ZM10.6691 24.2983L10.6691 24.2983C10.7406 24.4324 10.8728 24.5792 11.0793 24.6538C11.3072 24.7361 11.5609 24.7039 11.7614 24.5667L11.7614 24.5667C11.7978 24.5418 13.4597 23.4174 16.0003 23.4174C18.5426 23.4174 20.205 24.5432 20.2393 24.5667L20.2393 24.5667C20.4389 24.7034 20.6938 24.7372 20.9245 24.6528C21.1293 24.5779 21.2557 24.4338 21.3233 24.3136L22.4886 22.2427L24.3242 23.0447L21.6934 28.584H9.99882L7.65051 23.0635L9.57427 22.2435L10.6691 24.2983ZM24.4348 22.8117L24.4345 22.8124L24.4348 22.8117Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <path d="M12.75 4.66675C12.75 3.97639 13.3096 3.41675 14 3.41675H18C18.6904 3.41675 19.25 3.97639 19.25 4.66675V7.00008C19.25 7.13815 19.1381 7.25008 19 7.25008H13C12.8619 7.25008 12.75 7.13815 12.75 7.00008V4.66675Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <path d="M9.33398 22.6668L9.90564 11.2336C9.95887 10.1692 10.8374 9.3335 11.9031 9.3335H20.0982C21.1639 9.3335 22.0424 10.1692 22.0957 11.2336L22.6673 22.6668" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <path d="M14.667 7.35815V9.8901" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <path d="M17.334 7.35815V9.8901" stroke="#5FCF86" stroke-width="1.5"></path>
                                            </svg></div>
                                        <div class="title">
                                            <p class="sub">Seats</p>
                                            <p class="main">{{$data['capacity']}}
                                                seats</p>
                                        </div>
                                    </div>
                                    <div class="outstanding-features__item">
                                        <div class="wrap-svg"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25.9163 7.99992C25.9163 9.05846 25.0582 9.91659 23.9997 9.91659C22.9411 9.91659 22.083 9.05846 22.083 7.99992C22.083 6.94137 22.9411 6.08325 23.9997 6.08325C25.0582 6.08325 25.9163 6.94137 25.9163 7.99992Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <circle cx="23.9997" cy="23.9999" r="1.91667" stroke="#5FCF86" stroke-width="1.5"></circle>
                                                <path d="M17.9163 7.99992C17.9163 9.05846 17.0582 9.91659 15.9997 9.91659C14.9411 9.91659 14.083 9.05846 14.083 7.99992C14.083 6.94137 14.9411 6.08325 15.9997 6.08325C17.0582 6.08325 17.9163 6.94137 17.9163 7.99992Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <path d="M17.9163 23.9999C17.9163 25.0585 17.0582 25.9166 15.9997 25.9166C14.9411 25.9166 14.083 25.0585 14.083 23.9999C14.083 22.9414 14.9411 22.0833 15.9997 22.0833C17.0582 22.0833 17.9163 22.9414 17.9163 23.9999Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                                <circle cx="7.99967" cy="7.99992" r="1.91667" stroke="#5FCF86" stroke-width="1.5"></circle>
                                                <path d="M10.1025 26.6666V21.3333H7.99837C7.59559 21.3333 7.25184 21.4053 6.96712 21.5494C6.68066 21.6918 6.46278 21.894 6.31348 22.1562C6.16244 22.4166 6.08691 22.723 6.08691 23.0754C6.08691 23.4296 6.1633 23.7343 6.31608 23.9895C6.46886 24.243 6.69021 24.4374 6.98014 24.5728C7.26834 24.7083 7.6173 24.776 8.02702 24.776H9.43587V23.8697H8.20931C7.99403 23.8697 7.81521 23.8402 7.67285 23.7812C7.53049 23.7221 7.42459 23.6336 7.35514 23.5155C7.28396 23.3975 7.24837 23.2508 7.24837 23.0754C7.24837 22.8984 7.28396 22.7491 7.35514 22.6275C7.42459 22.506 7.53136 22.414 7.67546 22.3515C7.81782 22.2872 7.9975 22.2551 8.21452 22.2551H8.97493V26.6666H10.1025ZM7.22233 24.2395L5.89681 26.6666H7.1416L8.43848 24.2395H7.22233Z" fill="#5FCF86"></path>
                                                <path d="M24 10.6665V15.9998M24 21.3332V15.9998M16 10.6665V21.3332M8 10.6665V15.4998C8 15.776 8.22386 15.9998 8.5 15.9998H24" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg></div>
                                        <div class="title">
                                            <p class="sub">Engine</p>
                                            @if($data['engine'] == 1)
                                            <p class="main">Automatic transmission</p>
                                            @else
                                            <p class="main">Manual transmission</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="outstanding-features__item">
                                        <div class="wrap-svg"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.3337 27.2499H7.66699C7.52892 27.2499 7.41699 27.138 7.41699 26.9999V12.4599C7.41699 12.3869 7.44888 12.3175 7.5043 12.27L14.652 6.14344L14.1639 5.574L14.652 6.14344C14.6973 6.1046 14.755 6.08325 14.8147 6.08325H24.3337C24.4717 6.08325 24.5837 6.19518 24.5837 6.33325V26.9999C24.5837 27.138 24.4717 27.2499 24.3337 27.2499Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M12.0001 5.33325L7.42285 9.46712" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M17.888 19.5212L16.7708 15.93C16.5378 15.1812 15.4785 15.1798 15.2436 15.928L14.1172 19.5164C13.7178 20.7889 14.6682 22.0833 16.0019 22.0833C17.3335 22.0833 18.2836 20.7927 17.888 19.5212Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M23.2503 3.66675V5.66675C23.2503 5.80482 23.1384 5.91675 23.0003 5.91675H14.667C14.5827 5.91675 14.5365 5.8916 14.5072 5.86702C14.4721 5.83755 14.44 5.78953 14.4245 5.72738C14.4089 5.66524 14.4147 5.60775 14.4318 5.56523C14.4461 5.52975 14.4749 5.48584 14.5493 5.44616L18.2993 3.44616C18.3356 3.42685 18.376 3.41675 18.417 3.41675H23.0003C23.1384 3.41675 23.2503 3.52868 23.2503 3.66675Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg></div>
                                        <div class="title">
                                            <p class="sub">Fuel</p>
                                            @if($data['fuel'] == 0)
                                            <p class="main">Gasoline</p>
                                            @else
                                            <p class="main">Diesel</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="read-only-ratings mb-2 jq-ry-container" data-rateyo-read-only="true" readonly="readonly" style="width: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        @include('content.form-elements.car-description')
        @include('content.form-elements.cancel-policy')
    </div>

    <!-- Cart right -->
    <div class="col-xl-4">
        <div class="border rounded p-3 mb-3">

            <!-- Offer -->
            <h6>Offer</h6>
            <div class="row g-3 mb-3">
                <div class="col-8 col-xxl-8 col-xl-12">
                    <input type="text" class="form-control" placeholder="Enter Promo Code" aria-label="Enter Promo Code">
                </div>
                <div class="col-4 col-xxl-4 col-xl-12">
                    <div class="d-grid">
                        <button type="button" class="btn btn-label-primary">Apply</button>
                    </div>
                </div>
            </div>
            <form action="{{route('booking.rent', $data['id'])}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" value="2023-06-18T12:30:00" name="booking_start">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                    <div class="col-md-10">
                        <input class="form-control" type="datetime-local" value="2023-06-18T12:30:00" name="booking_end">
                    </div>
                </div>
                <!-- Price Details -->
                <h6>Price Details</h6>
                <dl class=" row mb-0">
                    <dt class="col-6 fw-normal">Per night price</dt>
                    <dd class="col-6 text-end" type="text" id="per_night_price" name="per_night_price" data-value="{{$data['per_night_price']}}">${{$data['per_night_price']}}</dd>

                    <dt class="col-6 fw-normal">Service charge</dt>
                    <dd class="col-6 text-success text-end" id="service_charge" name="usage_fee" data-value="{{$data['usage_fee']}}">${{$data['usage_fee']}}</dd>

                    <dt class="col-6 fw-normal">Insurance fees</dt>
                    <dd class="col-6 text-end" data-value="1200" id="insurance_fee" name="insurance_fee" data-value="{{$data['insurance_fee']}}">${{$data['insurance_fee']}}</dd>
                </dl>
                <hr class="mx-n3 mt-0">
                <dl class="row mb-0">
                    <dt class="col-6">Total</dt>
                    <dd class="col-6 fw-semibold text-end mb-0" name="total_amount" id="total"><input id="total_input" hidden name="total_amount">123</input></dd>
                </dl>
                <div class="d-grid" style="padding-top: 10px">
                    <button class="btn btn-primary btn-next">Rent now</button>
                </div>
            </form>
        </div>
        <div class="surcharge" style="padding: 16px; border: 1px solid #e0e0e0; border-radius: 10px; background: #fff;">
            <p class="title text-primary">Additional fees may contain</p>
            <div class="surcharge-container ">
                <div class="surcharge-item">
                    <div class="wrap-svg"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 7.33398V10.4407" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 6.05469C8.27614 6.05469 8.5 5.83083 8.5 5.55469C8.5 5.27855 8.27614 5.05469 8 5.05469C7.72386 5.05469 7.5 5.27855 7.5 5.55469C7.5 5.83083 7.72386 6.05469 8 6.05469Z" fill="#666666"></path>
                            <path d="M7.99967 14.1673C11.4054 14.1673 14.1663 11.4064 14.1663 8.00065C14.1663 4.5949 11.4054 1.83398 7.99967 1.83398C4.59392 1.83398 1.83301 4.5949 1.83301 8.00065C1.83301 11.4064 4.59392 14.1673 7.99967 14.1673Z" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></div>
                    <div class="content">
                        <div class="content-item">
                            <p class="title">Over time price</p>
                            <p class="cost"><span>${{$data['over_time_price']}}/h</span></p>
                        </div>
                        <div class="content-item">
                            <p>A surcharge will be incurred if the vehicle is returned late. In case more than <span>4 hours</span> late, additional <span>1 day</span> rental fee</p>
                        </div>
                    </div>
                </div>

                <div class="surcharge-item">
                    <div class="wrap-svg"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 7.33398V10.4407" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 6.05469C8.27614 6.05469 8.5 5.83083 8.5 5.55469C8.5 5.27855 8.27614 5.05469 8 5.05469C7.72386 5.05469 7.5 5.27855 7.5 5.55469C7.5 5.83083 7.72386 6.05469 8 6.05469Z" fill="#666666"></path>
                            <path d="M7.99967 14.1673C11.4054 14.1673 14.1663 11.4064 14.1663 8.00065C14.1663 4.5949 11.4054 1.83398 7.99967 1.83398C4.59392 1.83398 1.83301 4.5949 1.83301 8.00065C1.83301 11.4064 4.59392 14.1673 7.99967 14.1673Z" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></div>
                    <div class="content">
                        <div class="content-item">
                            <p class="title">Cleaning fee</p>
                            <p class="cost"><span>$20</span></p>
                        </div>
                        <div class="content-item">
                            <p>An additional fee is incurred when the returned vehicle is not hygienic (many stains, mud, etc.)</p>
                        </div>
                    </div>
                </div>
                <div class="surcharge-item">
                    <div class="wrap-svg"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 7.33398V10.4407" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8 6.05469C8.27614 6.05469 8.5 5.83083 8.5 5.55469C8.5 5.27855 8.27614 5.05469 8 5.05469C7.72386 5.05469 7.5 5.27855 7.5 5.55469C7.5 5.83083 7.72386 6.05469 8 6.05469Z" fill="#666666"></path>
                            <path d="M7.99967 14.1673C11.4054 14.1673 14.1663 11.4064 14.1663 8.00065C14.1663 4.5949 11.4054 1.83398 7.99967 1.83398C4.59392 1.83398 1.83301 4.5949 1.83301 8.00065C1.83301 11.4064 4.59392 14.1673 7.99967 14.1673Z" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></div>
                    <div class="content">
                        <div class="content-item">
                            <p class="title">Deodorization fee</p>
                            <p class="cost"><span>$60</span></p>
                        </div>
                        <div class="content-item">
                            <p>An additional surcharge will be incurred when the returned vehicle has an unpleasant odor (cigarette, smelling food)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .outstanding-features__item {
        display: flex;
        align-items: center;
        grid-gap: 16px;
        gap: 16px;
    }

    .outstanding-features__item .title {
        display: flex;
        flex-direction: column;
        grid-gap: 4px;
        gap: 4px;
    }

    .outstanding-features__item .title p.sub {
        color: #767676;
    }

    .outstanding-features__item .title p.main {
        font-size: 1.25rem;
        font-weight: 600;
        color: #000;
    }

    .car-outstanding {
        display: flex;
        grid-gap: 20px;
        gap: 20px;
        width: 100%;
        justify-content: space-between;
    }

    .surcharge-item {
        display: flex;
        font-size: .75rem;
        line-height: 16px;
        grid-gap: 12px;
        gap: 12px;
    }
</style>