@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
<script src="{{asset('assets/js/form-control-select.js')}}"></script>
@endsection
@php
$cities = __('city');
@endphp
@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">New station :</span>
</h4>

<div class="row">
    <form style="width: 100%;" class="mb-3" action="{{route('station.create')}}" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Station Information</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Station's name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="mail_address" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select city</label>
                    <select class="form-select" name="city" id="formControlSelectCity" aria-label="Default select example">
                        @foreach($cities as $key => $city)
                        <option value="{{$key}}">{{array_key_first($city)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select district</label>
                    <select class="form-select" name="district" id="formControlSelectDistrict" aria-label="Default select example">
                    </select>
                </div>
                <div class="form-check form-switch mb-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Always open</label>
                    <input id="alwayOpenCheckBox" class="form-check-input" type="checkbox" value="1" name="always_open">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Opening time</label>
                    <div class="col-md-10">
                        <input class="form-control" name="start_business_time" type="time" id="html5-time-input" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Close time</label>
                    <div class="col-md-10">
                        <input class="form-control" name="end_business_time" type="time" id="html5-time-input" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="cancelEditButton" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection