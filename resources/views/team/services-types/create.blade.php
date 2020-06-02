@extends('layouts.team')

@section('content')

    <div class="page-title">
        <h3>Empresas</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('teams.index') }}">Listado</a></li>
                <li class="active">Editar empresa</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-body">
                        {!!
                        Form::model(new \Nexo\Entities\ServiceType, ['route' => ['team.services-types.store', $team->slug]])
                        !!}
                        @include('team.services-types/partials/form', ['submit_text' => 'Crear', 'errors' => $errors])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection