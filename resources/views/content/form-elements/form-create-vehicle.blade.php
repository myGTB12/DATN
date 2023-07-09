@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')vehicle

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Create vehicle</span>
</h4>

<div class="row">
    <form style="width: 100%;" class="col-md-8" action="{{route('vehicle.create', ['station_id' => $station_id])}}" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Vehicle detail</h5>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" name="brand" class="form-control" id="basic-default-name bootstrap-maxlength-example" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="basic-default-company" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email">Vehicle number</label>
                    <div class="col-sm-10">
                        <input type="text" name="vehicle_number" class="form-control" id="basic-default-company" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Color</label>
                    <div class="col-sm-10">
                        <input type="text" name="color" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Capacity</label>
                    <div class="col-sm-10">
                        <input type="text" name="capacity" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Length (m)</label>
                    <div class="col-sm-10">
                        <input type="text" name="length" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Width (m)</label>
                    <div class="col-sm-10">
                        <input type="text" name="width" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Height (kg)</label>
                    <div class="col-sm-10">
                        <input type="text" name="height" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Per night price</label>
                    <div class="col-sm-10">
                        <input type="text" name="per_night_price" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Over time price</label>
                    <div class="col-sm-10">
                        <input type="text" name="unit_over_time_price" class="form-control phone-mask" />
                    </div>
                </div>
                <div class="col-md-5">
                </div>
                <div class="divider text-start-center">
                    <div class="divider-text"></div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    Create vehicle
                </button>
                <button type="button" id="cancelEditButton" class="btn btn-warning">Cancel</button>
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Create Vehicle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameWithTitle" class="form-label">Brand</label>
                                        <input type="text" id="nameWithTitle" class="form-control" readonly placeholder="">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Vehicle number</label>
                                        <input type="text" id="emailWithTitle" class="form-control" readonly placeholder="">
                                    </div>
                                    <div class="col mb-0">
                                        <label for="dobWithTitle" class="form-label">Capacity</label>
                                        <input type="text" id="dobWithTitle" class="form-control" readonly placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection