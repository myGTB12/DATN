@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  @if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  @if(session()->has('message'))
  <div class="alert alert-sucess alert-dismissible" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Welcome {{$station_owner->name}}! 🎉</h5>
            <p class="mb-4">Manage your station and verify reservations here</p>

            <a href="{{route('station.create')}}" class="btn btn-sm btn-outline-primary">Request Open Station</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart.png')}}" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Contact for Ads</span>
            <small class="text-primary fw-semibold"><i class='bx bx-up-arrow-alt'></i>{{__('messages.contact_ads_number')}}</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart.png')}}" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Contact for Ads</span>
            <small class="text-primary fw-semibold"><i class='bx bx-up-arrow-alt'></i>{{__('messages.contact_ads_number')}}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Revenue -->
  @foreach($stations as $station)
  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-8" style="width: 100%;">
          <h5 class="card-header m-0 me-2 pb-3">Station name: {{$station->name}}</h5>
        </div>
        <div class="col-md-6" style="width: 100%;">
          <div class="card mb-4">
            <a class="card-header" href="{{route('vehicle.index', ['station_id' => $station->id])}}">{{$station->name}}</a>
            <div class="card-body">
              <div class="mb-3">
                <a type="button" href="{{route('station.edit', $station->id)}}" class="btn btn-primary">
                  More information
                </a>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Address</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="{{$station->address}}" readonly />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Status</label>
                @if($station->status == 1)
                <div class="col">
                  <button type="button" class="btn btn-success">
                    Active
                  </button>
                </div>
                @else
                <div class="col">
                  <button type="button" class="btn btn-secondary">
                    Inactive
                  </button>
                </div>
                @endif
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Contact number</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="{{$station->phone}}" readonly />
              </div>
              @if(!$station->always_open)
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Opening time:</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="{{$station->start_business_time}}" readonly />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Close time</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="{{$station->start_business_time}}" readonly />
              </div>
              @else
              <div class="mb-3">
                <label for="exampleFormControlReadOnlyInput1" class="form-label">Alwasy open:</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="True" readonly />
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection