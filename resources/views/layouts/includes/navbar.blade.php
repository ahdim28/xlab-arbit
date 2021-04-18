<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="1 BTC = RP.878,460,000" aria-label="Search" readonly>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    {{-- <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" id="click-notif">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge count-dot" id="notif-dot">0</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header" id="count-new-notif"></span>
        <div class="dropdown-divider"></div>
        <div id="list-notifikasi">
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
        </div>
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item dropdown-footer">Show all</a>
      </div>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link" title="Profile">
        <i class="fas fa-user"></i>
      </a>
    </li>
    <li class="nav-item">
      <a href="javascript:void(0)" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="keluar">
        <i class="fas fa-sign-out-alt"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->