<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotel <sup>IT-Club</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile_admin')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile Saya</span></a>
      </li>
@if(auth()->user()->role == "superadmin")
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Daftar Admin
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('daftar_admin')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Admin</span></a>
      </li>
  @endif

    <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Daftar Tamu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Daftar Tamu </span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Daftar Tamu:</h6>
            <a class="collapse-item" href="{{route('daftar_tamu')}}">Data Tamu</a>

            <a class="collapse-item" href="{{route('daftar_check_in')}}">Daftar Check In Today</a>
            <a class="collapse-item" href="{{route('daftar_check_out')}}">Daftar Check Out Today</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
       Laporan Reservasi
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('laporan_reservasi')}}">
          <i class="fas fa-fw fa-time"></i>
          <span>Laporan Reservasi</span></a>
      </li>


     <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Hotel
      </div>


      <!-- Nav Item - Charts -->
      @if(auth()->user()->role == "superadmin")
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard_category_hotel')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>List Negara</span></a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard_hotel')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>List Hotel</span></a>
      </li>


       <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kamar
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard_category_kamar')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>List Kamar</span></a>
      </li>
  
      <hr class="sidebar-divider">
      <!-- Nav Item - Diskon -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('diskon_kamar')}}">
          <i class="fas fa-fw fa-voucher"></i>
          <span>Diskon Kamar</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->