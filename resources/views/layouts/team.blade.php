@include('partials.head')
@include('partials.navs')

<!-- Search Form -->
<main class="page-content content-wrap">
    @include('partials.team.header')


    <div ui-view=""></div>
</main>

@include('partials.footer')