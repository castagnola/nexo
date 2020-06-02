
@extends('layouts.master')

@section('content')
    {!! Form::model(new \Nexo\User, ['route' => ['teams.users.store', $teamId], 'class' => 'form-horizontal']) !!}
    <div class="page-title">
        <h3><i class="fa fa-group"></i> Usuarios</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('teams.users.index') }}">Listado</a></li>
                <li class="active">Crear empresa</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Información del primer usuario
                        </h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('first_name', 'Nombres', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

                                <div class="m-t-xxs">
                                    @foreach($errors->get('first_name', '<span class="text-danger">:message</span>') as $error)
                                        {!! $error !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {!! Form::label('last_name', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                <div class="m-t-xxs">
                                    @foreach($errors->get('last_name', '<span class="text-danger">:message</span>') as $error)
                                        {!! $error !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}

                                <div class="m-t-xxs">
                                    @foreach($errors->get('email', '<span class="text-danger">:message</span>') as $error)
                                        {!! $error !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            {!! Form::label('password', 'Contraseña', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::password('password', ['class' => 'form-control']) !!}

                                <div class="m-t-xxs">
                                    @foreach($errors->get('password', '<span class="text-danger">:message</span>') as $error)
                                        {!! $error !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    {!! Form::submit('Crear empresa', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
