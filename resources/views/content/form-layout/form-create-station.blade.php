@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Edit station :</span> {{}}
</h4>

<div class="row">
    <form style="width: 100%;" class="mb-3" action="" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Station Information</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="mail_address" class="form-control" id="exampleFormControlInput1"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Station's name</label>
                    <input type="text" name="car_name" class="form-control" id="exampleFormControlInput1"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"/>
                </div>
                <div class="form-check form-switch mb-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                    <input class="form-check-input" type="checkbox" name="status" value="1" id="statusCheckBox">
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
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" id="cancelEditButton" class="btn btn-warning">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection