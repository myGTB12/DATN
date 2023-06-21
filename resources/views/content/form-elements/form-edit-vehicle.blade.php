@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')vehicle

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Edit vehicle :</span> {{$vehicleDetail->name}}
</h4>

<div class="row">
    <form class="col-md-8" action="{{route('vehicle.edit', ['station_id' => $station_id, 'id' => $vehicleDetail->id])}}" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Vehicle Information</h5>
            <div class="card-body">
                <div class="col-md-5">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$vehicleDetail->name}}" />
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlInput1" class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" id="exampleFormControlInput1" value="{{$vehicleDetail->brand}}" />
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlInput1" class="form-label">Vehicle number</label>
                    <input type="text" name="vehicle_number" class="form-control" id="exampleFormControlInput1" value="{{$vehicleDetail->vehicle_number}}" />
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlInput1" class="form-label">Color</label>
                    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value="{{$vehicleDetail->color}}" />
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlInput1" class="form-label">Capacity</label>
                    <input type="text" name="capacity" class="form-control" id="exampleFormControlInput1" value="{{$vehicleDetail->capacity}}" />
                </div>
                <div class="col-md-5">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Booking status</label>
                </div>
                <div class="col-md-3">
                    <select id="selectTypeOpt" class="form-select color-dropdown">
                        <option value="bg-primary" selected>Primary</option>
                        <option value="bg-secondary">Secondary</option>
                    </select>
                </div>
                <div class="col-md-5">
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Opening time</label>
                    <div class="col-md-5">
                        <input class="form-control" name="start_business_time" type="time" value="{{$vehicleDetail->booking_start}}" id="html5-time-input" />
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Close time</label>
                    <div class="col-md-5">
                        <input class="form-control" name="end_business_time" type="time" value="{{$vehicleDetail->booking_end}}" id="html5-time-input" />
                    </div>
                </div>
                <div class="divider text-start-center">
                    <div class="divider-text"></div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" id="cancelEditButton" class="btn btn-warning">Cancel</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    Delete vehicle
                </button>
            </div>
        </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Delete Vehicle: {{$vehicleDetail->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                    <label for="nameWithTitle" class="form-label">Brand</label>
                    <input type="text" id="nameWithTitle" class="form-control" readonly placeholder="{{$vehicleDetail->brand}}">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                    <label for="emailWithTitle" class="form-label">Vehicle number</label>
                    <input type="text" id="emailWithTitle" class="form-control" readonly placeholder="{{$vehicleDetail->vehicle_number}}">
                    </div>
                    <div class="col mb-0">
                    <label for="dobWithTitle" class="form-label">Capacity</label>
                    <input type="text" id="dobWithTitle" class="form-control" readonly placeholder="{{$vehicleDetail->capacity}}">
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <form class="col-md-8" action="{{route('vehicle.delete', ['station_id' => $station_id, 'id' => $vehicle->id, 'vehicleDetail' => $vehicleDetail->id])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection