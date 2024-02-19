<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    @include('Layouts.Pegawai.link')
</head>

<body>
    @include('sweetalert::alert')

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('Layouts.Pegawai.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('Layouts.Pegawai.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('Layouts.Pegawai.navbar')
            <!-- Navbar End -->

            @yield('content')

            <!-- Footer Start -->
            @include('Layouts.Pegawai.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @stack('script')
    <!-- JavaScript Libraries -->
    @include('Layouts.Pegawai.script')
</body>

</html>
