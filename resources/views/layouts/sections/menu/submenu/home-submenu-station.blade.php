<ul class="menu-sub">
    {{-- active menu method --}}
    @php
    $activeClass = 'active';
    $active = 'active open';
    @endphp

    <li class="menu-item {{$activeClass}}">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select district</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Ha Noi</option>
                        <option value="2">Hai Phong</option>
                        <option value="3">Bac Ninh</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select city</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="1">Ha Noi</option>
                        <option value="2">Hai Phong</option>
                        <option value="3">Bac Ninh</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- submenu --}}
        @if (isset($submenu->submenu))
        @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
        @endif
    </li>
</ul>