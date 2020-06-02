@extends('layouts.team')

@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-group"></i> Usuarios
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Listado de usuarios</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            @if($team->canCreateUsers())

                <a class="btn btn-primary btn-addon" href="{{ route('team.users.create', $team->slug) }}">
                    <i class="fa fa-plus"></i>
                    Crear usuario
                </a>

            @else
                <div class="btn btn-primary disabled" title="Ha excedido el límite de creación de usuarios." data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-plus"></i>
                    Crear usuario
                </div>
            @endif

        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Listado de usuarios</h4>
                    </div>
                    <div class="panel-body">
                        @include('users.partials.table', ['fromTeam' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection