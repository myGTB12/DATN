@extends('layouts/blankLayout')

@section('title', __('messages.title'))

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">You dont have any reservations yet :(</h2>
        <a href="{{url('/')}}" class="btn btn-primary">Go pick up some car</a>
        <div class="mt-3">
            <img src="{{asset('assets/img/illustrations/page-misc-error-light.png')}}" alt="page-misc-error-light" width="500" class="img-fluid">
        </div>
    </div>
</div>
<!-- /Error -->
@endsection