@extends('layouts/adminNavbarLayout')

@section('title', __('messages.merge_titles') . __('messages.edit_station_owner'))

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Edit station owner:</span> {{$stationOwner->first_name}}
</h4>

<div class="row">
    <form style="width: 100%;" class="mb-3" action="{{route('users.edit', $stationOwner->id)}}" method="POST">
        @csrf
        <div class="card mb-4">
            <h5 class="card-header">Station Owner Information</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Station owner's name</label>
                    <input type="text" name="name" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->first_name . ' ' . $stationOwner->last_name}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->email}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Company name</label>
                    <input type="text" name="company_name" class="form-control" id="exampleFormControlInput1" value="{{$stationOwner->company_name}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->phone}}" />
                </div>
                @if($stationOwner->status == 2)
                <input name="status" type="hidden" value="2" />
                <button type="submit" class="btn btn-primary">Approve</button>
                <button type="button" id="cancelEditButton" class="btn btn-secondary">Cancel</button>
                @else
                <div class="form-check form-switch mb-2">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                    <input class="form-check-input" data-bs-toggle="modal" data-bs-target="#modalStatusConfirm" type="checkbox" name="status" value="1" id="statusCheckBox" @if($stationOwner->status) checked @endif>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" id="cancelEditButton" class="btn btn-secondary">Cancel</button>
                @endif
            </div>
        </div>
    </form>
</div>
<!-- Modal status -->
<div class="modal fade" id="modalStatusConfirm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Confirm change status of this station owner?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Station owner's name</label>
                    <input type="text" name="name" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->name}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="mail_address" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->email}}" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Company name</label>
                    <input type="text" name="company_name" class="form-control" readonly id="exampleFormControlInput1" value="{{$stationOwner->company_name}}" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endsection