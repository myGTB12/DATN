<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img class="border rounded" src="{{asset('assets/img/favicon/favicon.ico')}}" width="50" height="42">
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{__('messages.app_brand')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Services</span>
    </li>

    {{-- active menu method --}}
    @php
    $activeClass = App\Models\User::class;
    $currentRouteName = Route::currentRouteName();
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="/" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-buildings"></i>

        <div>Search By Station</div>
      </a>

      {{-- submenu --}}
      @include('layouts.sections.menu.submenu.home-submenu-station')
    </li>

    <li class="menu-item {{$activeClass}}">
      <a href="/" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-car"></i>

        <div>Search by car</div>
      </a>

      {{-- submenu --}}
      @include('layouts.sections.menu.submenu.home-submenu-car')
    </li>

    <li class="menu-item {{$activeClass}}">
      <a href="{{route('station.register')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-car-garage"></i>

        <div>Become Station Owner</div>
      </a>
    </li>
  </ul>

</aside>