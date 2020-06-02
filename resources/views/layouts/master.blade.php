@include('partials.head')
@include('partials.navs')

<!-- Search Form -->
<main class="page-content content-wrap" ng-controller="mainController as mainController">
    @include('partials.header')
    <!-- Navbar -->

    @include('partials.sidebar-menu')

    <div class="page-inner">
        @yield('content')
    </div>
    <!-- Page Inner -->
</main>

@include('partials.footer')
