@extends('layouts.master')

@section('content')

    <div ng-controller="teamEditController">


        <div class="page-title">
            <h3>Empresas</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                    <li class="active">Crear empresa</li>
                </ol>
            </div>
        </div>

        <div id="main-wrapper" ng-controller="teamEditController">
            {!!
            Form::model(new \Nexo\Entities\Team, ['method' => 'POST', 'route' => ['teams.store'], 'class' => 'form-horizontal', 'id' => 'nexo-team-form', 'ng-submit' => 'submit($event)'])
            !!}
            @include('teams.partials.form', ['submit_text' => 'Crear empresa', 'errors' => $errors])
            {!! Form::close() !!}
        </div>

    </div>
@endsection
