@extends('layouts/contentNavbarLayout')

@section('title', 'Carousel - UI elements')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Carousel</h4>

<div class="row">
  <!-- Bootstrap carousel -->
  <div class="col-md">
    <h5 class="my-4">Bootstrap carousel</h5>
    @foreach($array1 as $vehicle)
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{$vehicle->img}}" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img2}}" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img3}}" alt="Third slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img4}}" alt="Third slide" />
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
      @php
      $stationId = request()->route('station_id');
      @endphp
      <!-- <div class="product-listing-content">
        <h5><a href="">a </a></h5>
        <p class="list-price" style="display: inline-block">Price Per Day: b RS </p>
        <ul style="display: inline-block">
          <li><i class="fa fa-user" aria-hidden="true"></i> c seats</li>
          <li><i class="fa fa-calendar" aria-hidden="true"></i> d model</li>
          <li><i class="fa fa-car" aria-hidden="true">e </i></li>
        </ul>
        <p class="list-city">City: f </p>

        <a href="" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
      </div> -->
    </div>
    <a href="{{route('vehicle.show', ['id' => $vehicle->id, 'station_id' => $stationId])}}" class="btn btn-primary me-1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
      Details
    </a>
    <div class="divider">
      <div class="divider-text"></div>
    </div>
    @endforeach
  </div>
  <!-- Bootstrap crossfade carousel -->
  <div class="col-md">
    <h5 class="my-4">Bootstrap crossfade carousel (dark)</h5>
    @foreach($array2 as $vehicle)
    <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{$vehicle->img}}" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img2}}" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img3}}" alt="Third slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{$vehicle->img4}}" alt="Third slide" />
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
      <a class="btn btn-primary me-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Car Details
      </a>
    </div>
    <div class="divider">
      <div class="divider-text"></div>
    </div>
    @endforeach
  </div>
</div>

@endsection