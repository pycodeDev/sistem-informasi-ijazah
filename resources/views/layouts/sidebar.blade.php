<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Sistem Ijazah </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    @if (Auth()->User()->level == "mhs")
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ijazah', ['id' => Auth()->User()->id, 'level' => Auth()->User()->level]) }}">
                <i class="fas fa-fw fa-file"></i>
                <span>Ijazah</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('detail_user', ['id' => Auth()->User()->id]) }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Diri</span>
            </a>
        </li>
    @elseif (Auth()->User()->level == "staff")
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ijazah', ['id' => Auth()->User()->id, 'level' => Auth()->User()->level]) }}">
                <i class="fas fa-fw fa-file"></i>
                <span>Ijazah</span>
            </a>
        </li>
    @elseif (Auth()->User()->level == "dekan")
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ijazah', ['id' => Auth()->User()->id, 'level' => Auth()->User()->level]) }}">
                <i class="fas fa-fw fa-file"></i>
                <span>Ijazah</span>
            </a>
        </li>
    @elseif (Auth()->User()->level == "admin")
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ijazah_admin') }}">
                <i class="fas fa-fw fa-file"></i>
                <span>Ijazah</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user_admin') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>