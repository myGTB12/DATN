@extends('layouts/adminNavbarLayout')

@section('title', __('messages.title'))

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@php
$cities = __('city');
@endphp

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Approve station :</span> {{$station->name}}
</h4>

<div class="row">
    <form style="width: 100%;" class="mb-3" action="{{route('approve.station', $station->id)}}" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Station Information</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="mail_address" class="form-control" value="{{$station->mail_address}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Station's name</label>
                    <input type="text" name="name" class="form-control" value="{{$station->name}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$cities[$station->city][array_key_first($cities[$station->city])][$station->district] . ' - ' . array_key_first($cities[$station->city])}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$station->phone}}" />
                </div>
                <div class="form-check form-switch mb-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Always open</label>
                    <input id="alwayOpenCheckBox" class="form-check-input" type="checkbox" value="1" name="always_open" @if($station->always_open) checked @endif>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Opening time</label>
                    <div class="col-md-10">
                        <input class="form-control" name="start_business_time" type="time" value="{{$station->start_business_time}}" id="html5-time-input" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Close time</label>
                    <div class="col-md-10">
                        <input class="form-control" name="end_business_time" type="time" value="{{$station->end_business_time}}" id="html5-time-input" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Approve</button>
                <button type="button" id="cancelEditButton" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection