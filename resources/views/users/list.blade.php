@extends('layouts.master')

@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-group"></i> Usuarios

                @if(isset($team))
                    de {{ $team->name }}
                @else
                    del sistema
                @endif
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>

                    @if(isset($team))
                        <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                        <li><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></li>
                    @endif

                    <li class="active">Listado de usuarios</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary  btn-addon" href="{{ $createUrl }}">
                <i class="fa fa-plus"></i>
                Crear usuario
            </a>
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
                        @include('users.partials.table', ['fromTeam' => false])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection