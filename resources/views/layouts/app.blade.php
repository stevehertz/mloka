<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo/logo_2.png')}}">
    <title>@yield('title', '')</title>
    @include('components.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed accent-primary layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('img/logo/logo.png') }}" alt="{{ config('app.name') }}"
                height="60" width="150">
        </div>

        <!-- Navbar -->
        @include('includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('includes.footer')
    </div>
    <!-- ./wrapper -->
    @include('components.scripts')
    @stack('scripts')
</body>

</html>
