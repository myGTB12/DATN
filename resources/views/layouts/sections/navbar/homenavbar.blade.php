@php
$user = auth()->guard('user')->user();
@endphp

@if($user)
@include('layouts/sections/navbar/navbar')
@else
<nav class="navbar navbar-example navbar-expand-lg bg-light">
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-sucess alert-dismissible" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <div class="container-fluid">
        <a class="navbar-brand">Rental Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-3">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-ex-3">
            <div class="navbar-nav me-auto">
                <a class="nav-item nav-link active" href="{{route('home')}}">Home</a>
                <a class="nav-item nav-link active" href="">About us</a>
                <a class="nav-item nav-link active" href="">Contact</a>
            </div>

            <form onsubmit="return false">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalSignin">Sign-in Now</button>
            </form>
            <form onsubmit="return false">
                <button class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#modalSignup">Sign-up here</button>
            </form>
        </div>
    </div>
</nav>
@endif
<!-- Modal sign in -->
<div class="modal fade" id="modalSignin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Sign-in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">User name or email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="xxxx@xxx.xx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal sign up -->
<div class="modal fade" id="modalSignup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Sign-up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.register')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">User name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="xxxx@xxx.xx">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+084 12345678">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>