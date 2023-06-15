<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Components</span>
    </li>

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="/" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>

        <div>"Misc"</div>
      </a>

      {{-- submenu --}}
      @include('layouts.sections.menu.submenu', ['menu' => json_decode('[
      {
      "url": "/pages/account-settings-account",
      "name": "Manage Station Owner",
      "slug": "pages-account-settings-account"
      }
      ]')])
    </li>
  </ul>

</aside>