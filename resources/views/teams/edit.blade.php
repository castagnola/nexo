@extends('layouts.master')

@section('content')

    <div class="page-title">
        <h3><i class="fa fa-briefcase"></i> {{ $item->name  }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                <li class="active">Editar empresa</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper" ng-controller="teamEditController">
        {!!
        Form::model($item, ['method' => 'PUT', 'route' => ['teams.update', $item->id], 'class' => 'form-horizontal', 'id' => 'nexo-team-form', 'ng-submit' => 'submit($event)'])
        !!}
        @include('teams/partials/form', ['submit_text' => 'Editar', 'errors' => $errors])
        {!! Form::close() !!}
    </div>
@endsection