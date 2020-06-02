@extends('layouts.master')

@section('content')

    <div class="page-title">
        <h3>Usuario: {{ $item->first_name }} {{ $item->last_name }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>

                @if(isset($team))
                    <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                    <li><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></li>
                    <li><a href="{{ route('teams.users.index', $team->id) }}">Usuarios</a></li>
                @endif

                <li class="active">Editar usuario</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                {!!
                Form::model($item, ['method' => 'PATCH', 'route' => ['users.update', $item->id], 'class' => 'form-horizontal'])
                !!}
                <input name="return_url" type="hidden" value="{{ isset($returnUrl) ? $returnUrl : 0 }}"/>
                @include('users.partials.form', ['submit_text' => 'Editar', 'errors' => $errors, 'roles' => $roles])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection