@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

<!-- Basic Layout -->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Basic with Icons</h5>
        <small class="text-muted float-end">Merged input group</small>
      </div>
      <div class="card-body">
        <form>
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Name</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
              <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="{{$stationOwner->name}}" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Company</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input type="text" id="basic-icon-default-company" class="form-control" placeholder="{{$stationOwner->company_name}}" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Email</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input type="text" id="basic-icon-default-email" class="form-control" placeholder="{{$stationOwner->email}}" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
              <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="{{$stationOwner->phone}}" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
            </div>
          </div>
          <label class="form-label" for="basic-icon-default-phone">Status</label>
          <div class="demo-inline-spacing">
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Primary</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);">Active</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Inactive</a></li>
              </ul>
            </div>
          </div>
          <li style="list-style-type: none">
            <hr class="dropdown-divider">
          </li>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
