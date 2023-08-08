@extends('layouts/contentNavbarLayout')

@section('title', __('messages.title'))

@section('vendor-script')
<script src="{{asset('assets/js/address-length.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Reservations /</span> Confirm
</h4>

<div class="card">
    <h5 class="card-header">Reservation List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Start Station</th>
                    <th>Return Station</th>
                    <th>Reservation Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($reservations as $reservation)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$reservation->car_name}}</strong></td>
                    <td><a href="{{route('station.edit', $reservation->station_start_id)}}">{{$reservation->station_start_name}}</a></td>
                    <td><a href="{{route('station.edit', $reservation->station_end_id)}}">{{$reservation->station_end_name}}</a></td>
                    <td>{{$reservation->start_time . " ~ " . $reservation->end_time}}</td>
                    <td>{{$reservation->total_amount}}</td>
                    @if($reservation->status == 1)
                    <td><span class="badge bg-label-success me-1">Success</span></td>
                    @elseif($reservation->status == 2)
                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
                    @else
                    <td><span class="badge bg-label-secondary me-1">Canceled</span></td>
                    @endif
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('reservation.show', $reservation->id)}}"><i class="bx bx-edit-alt me-1"></i> Details</a>
                                <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i> Reject</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr style="height: 100px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection