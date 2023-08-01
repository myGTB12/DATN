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
        <h2 class="mb-2 mx-2">Submit success!</h2>
        <p class="mb-4 mx-2">We receive your request! Please wait for us to approve your request!</p>
        <a href="{{route('stations.index')}}" class="btn btn-primary">Back to home</a>
        <div class="mt-3">
            <img src="{{asset('assets/img/illustrations/safedrive.jpg')}}">
        </div>
    </div>
</div>
<!-- /Error -->
@endsection