@extends('layouts/homeNavbarLayout')

@section('title', __('messages.title'))

@php
$user = auth()->guard('user')->user();
$cities = __('city');
@endphp
@section('content')

<div class="row">
  <div class="card overflow-hidden">
    <!-- Help Center Header -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="background-image: url('assets/img/pages/landing.png'); background-repeat: no-repeat; background-size: cover; min-height: 500px!important; border-radius: 16px">
      <h3 class="text-center" style="color: #fff;"> {{__('messages.merge_titles')}} {{__('messages.slogan')}}</h3>
      <div class="input-wrapper my-3 input-group input-group-merge">
      </div>
      <p class="text-center px-3 mb-0" style="color: #fff;">Join us and find the car you want</p>
    </div>
    <!-- /Help Center Header -->

    <!-- Popular Articles -->
    @if(@$vouchers)
    <div class="help-center-popular-articles py-5">
      <div class="container-xl">
        <h4 class="text-center mt-2 mb-4">Sales Off & Voucher</h4>
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="row mb-3">
              @foreach($vouchers as $voucher)
              <div class="col-md-4 mb-md-0 mb-4">
                <div class="card border shadow-none">
                  <div class="card-body text-center" style="height: 350;">
                    <img class="mb-3" src="{{asset($voucher->img)}}" height="100">
                    <h5>{{$voucher->name}}</h5>
                    <p> {{$voucher->description}} </p>
                    <a class="btn btn-label-primary">Read More</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    <!-- /Popular Articles -->
  </div>
  <!-- Carousel -->
  <div class="m-container" style="text-align: center; padding-top:40px; position: relavtive; font-family: 'Manrope',-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif!important;">
    <h2 class="text-center" style="font-size: 3rem;">Cars For You</h2>
  </div>
  <!-- 1 -->
  @foreach($vehicles_1 as $vehicle)
  <div class="col-md-6 col-lg-4 mb-3" style="background-color: #fcfdfd; border: 1px solid #e0e0e0; border-radius:16px;">
    <div class="card-body">
      <h5 class="card-title">{{$vehicle->car_name}}</h5>
      <h6 class="card-subtitle text-muted">Brand: {{$vehicle->brand}}</h6>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset($vehicle->img)}}" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img2)}}" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img3)}}" alt="Third slide" />
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
    @if(!$user)
    <form onsubmit="return false">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city]
        [array_key_first($cities[$vehicle->city])]
        [$vehicle->district - 1] 
        . " - " . 
        array_key_first($cities[$vehicle->city])}}
      </p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSignin">Rent Now</button>
    </form>
    @else
    <div class="card-body">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city][array_key_first($cities[$vehicle->city])][$vehicle->district - 1] . " - " . array_key_first($cities[$vehicle->city])}}</p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <a href="{{route('booking.show', ['station_id' => '', 'id' => $vehicle->id])}}" class="btn btn-outline-primary">Rent Now</a>
    </div>
    @endif
  </div>
  @endforeach
  <div class="divider">
    <div class="divider-text" style="margin-bottom: 15px;">Rental Cars</div>
  </div>
  <!-- 2 -->
  @foreach($vehicles_2 as $vehicle)
  <div class="col-md-6 col-lg-4 mb-3" style="background-color: #fcfdfd; border: 1px solid #e0e0e0; border-radius:16px;">
    <div class="card-body">
      <h5 class="card-title">{{$vehicle->car_name}}</h5>
      <h6 class="card-subtitle text-muted">Brand: {{$vehicle->brand}}</h6>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset($vehicle->img)}}" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img2)}}" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img3)}}" alt="Third slide" />
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
    @if(!$user)
    <form onsubmit="return false">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city][array_key_first($cities[$vehicle->city])][$vehicle->district - 1] . " - " . array_key_first($cities[$vehicle->city])}}</p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSignin">Rent Now</button>
    </form>
    @else
    <div class="card-body">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city][array_key_first($cities[$vehicle->city])][$vehicle->district - 1] . " - " . array_key_first($cities[$vehicle->city])}}</p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <a href="{{route('booking.show', ['station_id' => '', 'id' => $vehicle->id])}}" class="card-link">Rent Now</a>
    </div>
    @endif
  </div>
  @endforeach
  <div class="divider">
    <div class="divider-text" style="margin-bottom: 15px;">Rental Cars</div>
  </div>
  <!-- 3 -->
  @foreach($vehicles_3 as $vehicle)
  <div class="col-md-6 col-lg-4 mb-3" style="background-color: #fcfdfd; border: 1px solid #e0e0e0; border-radius:16px;">
    <div class="card-body">
      <h5 class="card-title">{{$vehicle->car_name}}</h5>
      <h6 class="card-subtitle text-muted">Brand: {{$vehicle->brand}}</h6>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset($vehicle->img)}}" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img2)}}" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset($vehicle->img3)}}" alt="Third slide" />
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
    @if(!$user)
    <form onsubmit="return false">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city][array_key_first($cities[$vehicle->city])][$vehicle->district - 1] . " - " . array_key_first($cities[$vehicle->city])}}</p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSignin">Rent Now</button>
    </form>
    @else
    <div class="card-body">
      <p class="card-text" style="padding-top: 10px;"><i class='bx bx-map-pin mb-2'></i> {{$cities[$vehicle->city][array_key_first($cities[$vehicle->city])][$vehicle->district - 1] . " - " . array_key_first($cities[$vehicle->city])}}</p>
      <p class="card-text" style="padding-top: 10px; color: #5fcf86"><i class='bx bx-dollar-circle mb-2' style="padding-top: 3px;"></i> {{$vehicle->per_night_price}}</p>
      <div style="margin: auto 0 12px; border-bottom: 1px solid #e0e0e0;"></div>
      <a href="{{route('booking.show', ['station_id' => '', 'id' => $vehicle->id])}}" class="card-link">Rent Now</a>
    </div>
    @endif
  </div>
  @endforeach
  <div class="divider">
    <div class="divider-text" style="margin-bottom: 15px;">Rental Cars</div>
  </div>
  <!-- End carousel-->
  <!-- Knowledge Base -->
  <div class="card overflow-hidden">
    <div class="help-center-knowledge-base py-5">
      <div class="container-xl">
        <h4 class="text-center mb-4">Our Advantages</h4>
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="row">
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-success p-2 rounded me-2"><i class="bx bx-cart bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Keep mind to book a car</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="">No cancellation fee within 1 hour of reservation.</a></li>
                      <li class="text-primary pb-1"><a href="">100% refund and compensation if the vehicle owner cancels within 7 days of the trip.</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-info p-2 rounded me-2"><i class="bx bx-laptop bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Simple procedures</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="">Just have a chip ID (Or Passport) & Driver's License and you are eligible to rent a car</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-primary p-2 rounded me-2"><i class="bx bx-user bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Easy payment</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1"><a href="">Variety of payment methods</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-danger p-2 rounded me-2"><i class="bx bx-world bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Diversified car</h5>
                    </div>
                    <p class="mb-0 fw-semibold">
                      <a>More than 100 models for you to choose from: Mini, Sedan, CUV, SUV, MPV, Pickup.</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-warning p-2 rounded me-2"><i class="bx bx-mobile-alt bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Drive safe</h5>
                    </div>
                    <ul>
                      <li class="text-primary py-1">
                        <a href="">Steady your hand with car rental insurance</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge bg-label-secondary p-2 rounded me-2"><i class="bx bx-envelope bx-sm"></i></span>
                      <h5 class="fw-semibold mt-3 ms-1">Car delivery</h5>
                    </div>
                    <ul>
                      <li class="text-primary pb-1">
                        <a href="">You can choose to have your car delivered to your home/airport...</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<!-- Modal sign in -->
<div class="modal fade" id="modalSignin" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Sign-in to continue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('user.login')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">User name or email</label>
              <input type="text" name="email" id="nameWithTitle" class="form-control" placeholder="Enter Name">
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailWithTitle" class="form-label">Password</label>
              <input type="password" name="password" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>