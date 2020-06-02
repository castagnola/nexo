@extends('layouts.team')

@section('content')

    <div class="page-title">
        <h3>Items de servicio</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('team.services-types.index', $team->slug) }}">Tipos de servicio</a></li>
                <li><a href="{{ route('team.services-types.show', [$team->slug, $serviceType->id]) }}">{{ $serviceType->name }}</a></li>
                <li><a href="{{ route('team.services-types.services-items.index', [$team->slug, $serviceType->id]) }}">Items</a></li>
                <li class="active">Crear item</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-body">
                        {!!
                        Form::model(new \Nexo\Entities\ServiceItem, ['route' => ['team.services-types.services-items.store', $team->slug, $serviceType->id]])
                        !!}
                        @include('team.services-types.items.partials.form', ['submit_text' => 'Crear', 'errors' => $errors])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection