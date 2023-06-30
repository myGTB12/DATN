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
                        <option value="Honda">Honda</option>
                        <option value="Mercedes">Mercedes</option>
                        <option value="Ford">Ford</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Kia">Kia</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Suzuki">Suzuki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select name</label>
                    <select class="form-select" name="name" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="Honda City">Honda City</option>
                        <option value="Toyota Vios">Toyota Vios</option>
                        <option value="Honda CR-V">Honda CR-V</option>
                        <option value="Ford Ranger">Ford Ranger</option>
                        <option value="Mazda CX-5">Mazda CX-5</option>
                        <option value="Hyundai Tucson">Hyundai Tucson</option>
                        <option value="Kia Cerato">Kia Cerato</option>
                        <option value="Mitsubishi Triton">Mitsubishi Triton</option>
                        <option value="Chevrolet Cruze">Chevrolet Cruze</option>
                        <option value="Nissan Terra">Nissan Terra</option>
                        <option value="Ford EcoSport">Ford EcoSport</option>
                        <option value="Toyota Fortuner">Toyota Fortuner</option>
                        <option value="Mitsubishi Xpander">Mitsubishi Xpander</option>
                        <option value="Hyundai Grand i10">Hyundai Grand i10</option>
                        <option value="Kia Seltos">Kia Seltos</option>
                        <option value="Mazda3">Mazda3</option>
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