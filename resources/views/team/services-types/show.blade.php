@extends('layouts.team')

@section('content')



    <div class="page-title clearfix">


        <div class="pull-left">
            <h3>Tipo de servicio: {{ $item->name }}</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('team', $team->slug) }}">Home</a></li>
                    <li><a href="{{ route('team.services-types.index', $team->slug) }}">Tipos de servicios</a></li>
                    <li class="active">Ver tipo de servicio</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary btn-addon" href="{{ route('team.services-types.edit',[$team->slug, $item->id]) }}">
                <i class="fa fa-pencil"></i>
                Editar
            </a>

            <a class="btn btn-danger btn-addon" href="{{ route('team.services-types.destroy',[$team->slug, $item->id]) }}">
                <i class="fa fa-remove"></i>
                Eliminar
            </a>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="form-group">
                            <strong>Nombre</strong>

                            <p class="form-control-static">{{ $item->name }}</p>
                        </div>

                        <div class="form-group">
                            <strong>Tiempo estimado de respuesta</strong>

                            <p class="form-control-static">{{ $item->avg_response_time }}</p>
                        </div>

                        <div class="form-group">
                            <strong>Descripción</strong>

                            <p class="form-control-static">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection