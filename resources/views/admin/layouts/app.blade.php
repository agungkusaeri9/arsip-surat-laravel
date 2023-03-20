{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <x-Admin.Navbar></x-Admin.Navbar>
            <div class="main-sidebar">
                <x-Admin.Sidebar></x-Admin.Sidebar>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <x-Admin.Footer></x-Admin.Footer>
        </div>
    </div>

    @include('admin.layouts.partials.scripts')
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <x-Admin.Sidebar></x-Admin.Sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
              <x-Admin.Navbar></x-Admin.Navbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <x-Admin.Footer></x-Admin.Footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->

    @include('admin.layouts.partials.scripts')

</body>

</html>
