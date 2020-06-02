@extends('layouts.team')

@section('content')

    <div class="page-title">
        <h3>Tipo de servicio: {{ $item->name }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ route('team', $team->slug) }}">Home</a></li>
                <li><a href="{{ route('team.services-types.index', $team->slug) }}">Tipos de servicios</a></li>
                <li class="active">Editar tipo de servicio</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-body">
                        {!!
                        Form::model($item, ['method' => 'PUT', 'route' => ['team.services-types.update', $team->slug, $item->id]])
                        !!}
                        @include('team.services-types/partials/form', ['submit_text' => 'Editar', 'errors' => $errors])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection