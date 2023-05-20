<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">{{ $pengaturan->nama }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.surat.index') }}">
            <i class="fas fa-fw fa-pen-square"></i>
            <span>Surat</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.klasifikasi.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Klasifikasi</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.sifat-surat.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sifat Surat</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link mb-0 pb-0 collapsed" href="#" data-toggle="collapse" data-target="#transaksi_surat"
            aria-expanded="true" aria-controls="transaksi_surat">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Transaksi Surat</span>
        </a>
        <div id="transaksi_surat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.surat-masuk.index') }}">Surat Masuk</a>
                <a class="collapse-item" href="{{ route('admin.surat-keluar.index') }}">Surat Keluar</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link mb-0 pb-0 collapsed" href="#" data-toggle="collapse" data-target="#buku_agenda"
            aria-expanded="true" aria-controls="buku_agenda">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku Agenda</span>
        </a>
        <div id="buku_agenda" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.buku-agenda.surat-masuk.index') }}">Surat Masuk</a>
                <a class="collapse-item" href="{{ route('admin.buku-agenda.surat-keluar.index') }}">Surat Keluar</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>



    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.pengaturan.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2 d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
