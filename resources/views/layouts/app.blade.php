<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body id="page-top">
<div id="wrapper">
    @auth
        @include('partials.sidebar')
    @endauth
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @auth
                @include('partials.navbar')
            @endauth
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            @yield('content')
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
       @include('partials.footer')
</body>
</html>

