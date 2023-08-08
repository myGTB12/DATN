@extends('layouts/adminNavbarLayout')

@section('title', __('messages.title'))

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Stations /</span> Owner
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">List Station Owners</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($stationOwners as $stationOwner)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$stationOwner->name}}</strong></td>
          <td>{{$stationOwner->email}}</td>
          <td>{{$stationOwner->phone}}</td>
          @if($stationOwner->status == 1)
          <td><span class="badge bg-label-success me-1">Active</span></td>
          @elseif($stationOwner->status == 2)
          <td><span class="badge bg-label-primary me-1">Register</span></td>
          @else
          <td><span class="badge bg-label-secondary me-1">Inactive</span></td>
          @endif
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('users.edit', $stationOwner->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modelDelete"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="modelDelete" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="{{route('users.delete', $stationOwner->id)}}">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modelDeleteTitle">Are you sure to delete this station owner?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Name</label>
                      <input type="text" readonly name="name" class="form-control" value="{{$stationOwner->name}}">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Email</label>
                      <input type="text" readonly name="email" class="form-control" value="{{$stationOwner->email}}">
                    </div>
                    <div class="col mb-0">
                      <label for="dobWithTitle" class="form-label">Phone</label>
                      <input type="text" readonly name="phone" class="form-control" value="{{$stationOwner->phone}}">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

<hr class="my-5">
@endsection