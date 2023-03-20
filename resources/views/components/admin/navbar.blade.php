{{-- <div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        <ul class="navbar-nav navbar-right ml-auto">
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}/"
                        class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Str::ucfirst(auth()->user()->name) }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title"></div>
                    <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="{{ route('admin.change-password.index') }}" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Ubah Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" onclick="document.getElementById('formLogout').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="formLogout">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div> --}}

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Str::ucfirst(auth()->user()->name) }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ auth()->user()->avatar() }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.change-password.index') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void()" onclick="document.getElementById('formLogout').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <form action="{{ route('logout') }}" method="post" id="formLogout">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
