@extends('layouts.base')


@section('content')
        <!-- Search Form -->
<main class="page-content content-wrap">
    @include('partials.team.header')

    <div ui-view=""></div>
</main>

@endsection



@section('footer-scripts')
    {!!  Html::script(asset('assets/js/app.client.js'))  !!}
@endsection