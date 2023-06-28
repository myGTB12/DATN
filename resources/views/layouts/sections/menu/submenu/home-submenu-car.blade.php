<ul class="menu-sub">
    {{-- active menu method --}}
    @php
    $activeClass = 'active';
    $active = 'active open';
    @endphp

    <li class="menu-item {{$activeClass}}">
        <div class="card mb-4">
            <form action="{{route('vehicle.searchByCar')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select brand</label>
                    <select class="form-select" name="brand" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="Mazda">Mazda</option>
                        <option value="Mercedes">Mercedes</option>
                        <option value="Ranger Rover">Ranger Rover</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select name</label>
                    <select class="form-select" name="name" id="exampleFormControlSelect1" aria-label="Default select example">
                        @foreach($cities as $key => $city)
                        <option value="{{$key}}">{{$city}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select capacity</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" value="4" name="capacity" id="html5-number-input" />
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