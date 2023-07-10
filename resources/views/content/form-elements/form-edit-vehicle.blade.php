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
    <form style="width: 100%;" class="col-md-8" action="{{route('vehicle.edit', ['station_id' => $station_id, 'id' => $vehicleDetail->id])}}" method="POST">
        @csrf
        <div class="card mb-6 full-width">
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Select brand</label>
                        <div class="col-sm-10">
                            <select class="select2 form-select select2-hidden-accessible" name="brand" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="Honda">Honda</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Ford">Ford</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">Kia</option>
                                <option value="Mitsubishi">Mitsubishi</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Suzuki">Suzuki</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Select name</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="name" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="Honda City">Honda City</option>
                                <option value="Toyota Vios">Toyota Vios</option>
                                <option value="Honda CR-V">Honda CR-V</option>
                                <option value="Ford Ranger">Ford Ranger</option>
                                <option value="Mazda CX-5">Mazda CX-5</option>
                                <option value="Hyundai Tucson">Hyundai Tucson</option>
                                <option value="Kia Cerato">Kia Cerato</option>
                                <option value="Mitsubishi Triton">Mitsubishi Triton</option>
                                <option value="Chevrolet Cruze">Chevrolet Cruze</option>
                                <option value="Nissan Terra">Nissan Terra</option>
                                <option value="Ford EcoSport">Ford EcoSport</option>
                                <option value="Toyota Fortuner">Toyota Fortuner</option>
                                <option value="Mitsubishi Xpander">Mitsubishi Xpander</option>
                                <option value="Hyundai Grand i10">Hyundai Grand i10</option>
                                <option value="Kia Seltos">Kia Seltos</option>
                                <option value="Mazda3">Mazda3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Vehicle number</label>
                        <div class="col-sm-10">
                            <input type="text" name="vehicle_number" class="form-control" value="{{$vehicleDetail->vehicle_number}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Color</label>
                        <div class="col-sm-10">
                            <input type="text" name="color" value="{{$vehicleDetail->color}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Capacity</label>
                        <div class="col-sm-10">
                            <input type="text" name="capacity" value="{{$vehicleDetail->capacity}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Length (m)</label>
                        <div class="col-sm-10">
                            <input type="text" name="length" value="{{$vehicleDetail->length}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Width (m)</label>
                        <div class="col-sm-10">
                            <input type="text" name="width" value="{{$vehicleDetail->width}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Height (kg)</label>
                        <div class="col-sm-10">
                            <input type="text" name="height" value="{{$vehicleDetail->height}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Per night price</label>
                        <div class="col-sm-10">
                            <input type="text" name="per_night_price" value="{{$vehicleDetail->per_night_price}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Over time price</label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_over_time_price" value="{{$vehicleDetail->unit_over_time_price}}" />
                        </div>
                    </div>
                    <div class="divider divider-primary">
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                Delete vehicle
                            </button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
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