@extends('layouts/adminNavbarLayout')

@section('title', __('messages.title'))

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit/</span> Station Owner</h4>

<!-- Basic Layout -->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Station owner's id: <span class="text-muted fw-light">{{$stationOwner->id}}</span></h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('users.edit', $stationOwner->id)}}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Name</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
              <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" value="{{$stationOwner->name}}" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Company</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input type="text" name="company_name" id="basic-icon-default-company" class="form-control" value="{{$stationOwner->company_name}}" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Email</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input type="text" name="email" id="basic-icon-default-email" class="form-control" value="{{$stationOwner->email}}" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
              <input type="text" name="phone" id="basic-icon-default-phone" class="form-control phone-mask" value="{{$stationOwner->phone}}" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
            </div>
          </div>
          <div class="demo-inline-spacing">
            <div class="col-md-3">
            <label class="form-label" for="basic-icon-default-phone">Status</label>
            <select id="selectTypeOpt" name="status" class="form-select color-dropdown">
              <option value="1" selected>Active</option>
              <option value="0">Inactive</option>
            </select>
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
