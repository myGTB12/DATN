<ul class="menu-sub">
  {{-- active menu method --}}
  @php
  $activeClass = null;
  $active = 'active open';
  $currentRouteName = Route::currentRouteName();
  @endphp

  <li class="menu-item {{$currentRouteName === 'users.list' ? 'active open' : ''}}">
    <a href="" class="menu-link">
      <i class=""></i>
      <div>Manage Station Owner</div>
    </a>
  </li>
  <li class="menu-item {{$currentRouteName === 'users.request' ? 'active open' : ''}}">
    <a href="" class="menu-link">
      <i class=""></i>
      <div>Station Request</div>
    </a>
  </li>
</ul>
