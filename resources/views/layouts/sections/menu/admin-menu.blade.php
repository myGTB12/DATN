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

    {{-- main menu --}}
    <li class="menu-item active">
      <a href="/" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>

        <div>Management</div>
      </a>

      {{-- submenu --}}
      @include('layouts.sections.menu.admin-submenu')
    </li>
  </ul>

</aside>