@extends('layouts.team')

@section('content')
    {!! Form::model(new \Nexo\User, ['route' => ['team.users.store', $team->slug], 'class' => 'form-horizontal']) !!}
    <div class="page-title">
        <h3><i class="fa fa-group"></i> Usuarios</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Crear usuario</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                @include('users.partials.form', ['submit_text' => 'Crear', 'errors' => $errors, 'roles' => $roles])
            </div>

        </div>
    </div>

    {!! Form::close() !!}
@endsection
