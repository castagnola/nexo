@extends('layouts.team')

@section('content')

    <div class="page-title">
        <h3>Usuario: {{ $profile->present()->name }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>

                <li class="active">Editar perfil</li>
            </ol>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                {!!
                Form::model($profile, ['method' => 'PATCH', 'route' => ['users.update', $profile->id], 'class' => 'form-horizontal'])
                !!}
                <input name="return_url" type="hidden" value="{{ isset($returnUrl) ? $returnUrl : 0 }}"/>
                @include('users.partials.form', ['submit_text' => 'Editar', 'errors' => $errors])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection