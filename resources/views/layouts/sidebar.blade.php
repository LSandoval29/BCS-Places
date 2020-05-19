<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
style="background: #2898bf;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/home')}}">
    <div class="card-body box-profile">
      <img class="img-fluid  rounded-circle"
          src="{{asset('app_assets/imagenes/map.png') }}"
          alt="map picture">
    </div>
    <div class="sidebar-brand-text mx-3">B.C.S <b>Places</b></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
  <a class="nav-link" href="{{URL::to('/municipios')}}">
  <i class="fas fa-place-of-worship"></i>
  <span>Municipios</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
