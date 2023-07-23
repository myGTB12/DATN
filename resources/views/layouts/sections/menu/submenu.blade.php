<ul class="menu-sub">
  {{-- active menu method --}}
  @php
  $activeClass = null;
  $active = 'active open';
  $currentRouteName = Route::currentRouteName();
  @endphp

  <li class="menu-item {{$currentRouteName === 'stations.index' ? 'active open' : ''}}">
    <a href="{{route('stations.index')}}" class="menu-link">
      <i class=""></i>
      <div>My Station</div>
    </a>
  </li>
  <li class="menu-item {{$currentRouteName === 'booking.index' ? 'active open' : ''}}">
    <a href="{{route('booking.index')}}" class="menu-link">
      <i class=""></i>
      <div>My Reservation</div>
    </a>
  </li>
</ul>