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
            <i class="fas fa-fw fa-folder"></i>
            <span>Surat</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.klasifikasi.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Klasifikasi</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.sifat-surat.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sifat Surat</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.surat-masuk.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Surat Masuk</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.surat-keluar.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.buku-agenda.surat-masuk.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Buku Agenda Surat Masuk</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.buku-agenda.surat-keluar.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Buku Agenda Surat Keluar</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link mb-0 pb-0" href="{{ route('admin.galeri.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Galeri</span></a>
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
