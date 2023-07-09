@section('page-script')
<script src="{{asset('assets/js/form-control-select.js')}}"></script>
@endsection
@php
$cities = __('city');
@endphp
<ul class="menu-sub">
    <li class="menu-item active">
        <div class="card mb-4">
            <form action="{{route('vehicle.searchByStation')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select city</label>
                        <select class="form-select" id="formControlSelectCity" aria-label="Default select example">
                            @foreach($cities as $key => $city)
                            <option value="{{$key}}">{{$city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select district</label>
                        <select class="form-select" id="formControlSelectDistrict" aria-label="Default select example">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Station name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="name" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        {{-- submenu --}}
        @if (isset($submenu->submenu))
        @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
        @endif
    </li>
</ul>