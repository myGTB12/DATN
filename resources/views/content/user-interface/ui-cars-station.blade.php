@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Your station/</span> All cars</h4>
@php
$stationId = request()->route('station_id');
@endphp
<a class="btn btn-success me-1" href="{{route('vehicle.create', $stationId)}}" role="button" aria-expanded="false" aria-controls="collapseExample">
  Add new car
</a>
<hr class="dropdown-divider">
<div class="divider text-start-center">
</div>
<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Brand</th>
          <th>Name</th>
          <th>Capacity</th>
          <th>Per night price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($vehicleDetails as $detail)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$detail->brand}}</strong></td>
          <td>{{$detail->name}}</td>
          <td>{{$detail->capacity}}</td>
          <td>{{$detail->per_night_price}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('vehicle.show', [$stationId, $detail->id])}}"><i class="bx bx-edit-alt me-1"></i> More details</a>
                <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection