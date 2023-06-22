<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: #5E1914">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3 mt-5">
            <img src="{{ $pengaturan->gambar() }}" style="height:60px" class="mt-2 img-fluid mb-2" alt="">
            <br>
            <span class="mt-5 mb-3"> {{ $pengaturan->nama }}
        </div></span>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-5">

    <!-- Nav Item - Dashboard -->
    @can('Dashboard')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    @can('Surat Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.surat.index') }}">
                <i class="fas fa-fw fa-pen-square"></i>
                <span>Surat</span></a>
        </li>
    @endcan

    <!-- Nav Item - Charts -->
    @can('Klasifikasi Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.klasifikasi.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Klasifikasi</span></a>
        </li>
    @endcan

    <!-- Nav Item - Charts -->
    @can('Sifat Surat Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.sifat-surat.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Sifat Surat</span></a>
        </li>
    @endcan

    @canany(['Surat Masuk Read', 'Surat Keluar Read'])
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0 collapsed" href="#" data-toggle="collapse" data-target="#transaksi_surat"
                aria-expanded="true" aria-controls="transaksi_surat">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Transaksi Surat</span>
            </a>
            <div id="transaksi_surat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    @can('Surat Masuk Read')
                        <a class="collapse-item" href="{{ route('admin.surat-masuk.index') }}">Surat Masuk</a>
                    @endcan
                    @can('Surat Keluar Read')
                        <a class="collapse-item" href="{{ route('admin.surat-keluar.index') }}">Surat Keluar</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @canany(['Buku Agenda Surat Masuk Read', 'Buku Agenda Surat Keluar Read'])
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0 collapsed" href="#" data-toggle="collapse" data-target="#buku_agenda"
                aria-expanded="true" aria-controls="buku_agenda">
                <i class="fas fa-fw fa-book"></i>
                <span>Buku Agenda</span>
            </a>
            <div id="buku_agenda" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    @can('Buku Agenda Surat Masuk Read')
                        <a class="collapse-item" href="{{ route('admin.buku-agenda.surat-masuk.index') }}">Surat Masuk</a>
                    @endcan
                    @can('Buku Agenda Surat Keluar Read')
                        <a class="collapse-item" href="{{ route('admin.buku-agenda.surat-keluar.index') }}">Surat Keluar</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    <!-- Nav Item - Charts -->
    @can('Role Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Role</span></a>
        </li>
    @endcan

    <!-- Nav Item - Charts -->
    @can('Permission Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.permissions.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Permission</span></a>
        </li>
    @endcan

    <!-- Nav Item - Charts -->
    @can('User Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>
    @endcan


    @can('Setting Read')
        <li class="nav-item">
            <a class="nav-link mb-0 pb-0" href="{{ route('admin.pengaturan.index') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider mt-2 d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
