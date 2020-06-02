@extends('layouts.unlogged')

@section('content')

<div layout="column" flex id="login-container" role="main" ng-controller="loginController">
    <md-content class="animated fadeIn" layout="row" flex ng-if="showForm">
        <div layout="row" layout-align="center center" layout-fill style="height: 100%;">

            <md-whiteframe class="md-whiteframe-z1 animated fadeInUp" layout="column" flex="30" flex-xs="90">
                <md-toolbar>
                    <div class="md-toolbar-tools">Ingreso a Nexo Logística</div>
                </md-toolbar>
                <md-content layout-padding>
                    @if(isset($errors))
                        @if (count($errors) > 0)
                            <md-input-container class="md-block errors">
                                <strong>Algo pasó mientras se intentaba el ingreso:</strong> <br><br>
                                <ul>
                                    @if(is_string($errors))
                                        <li>{!! $errors !!}</li>
                                    @else
                                        @foreach ($errors->all() as $error)
                                            <li>{!! $error !!}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </md-input-container>
                        @endif
                    @endif

                    <form id="nexo-login-form" role="form" method="POST" action="{{ url('/login') }}" novalidate>
                        {!! csrf_field() !!}
                        <md-input-container class="md-block" md-no-float>
                            <label>Correo electrónico</label>
                            <input name="email" type="email">
                        </md-input-container>
                        <md-input-container class="md-block" md-no-float>
                            <label>Contraseña</label>
                            <input name="password" type="password">
                        </md-input-container>
                        <div layout="column" layout-align="center center">
                            <md-button type="submit" class="md-block md-raised md-primary" flex-sm="100">Ingresar</md-button>
                            <md-button class="md-block" href="{{ URL::to('password/email') }}">Recuperar contraseña</md-button>
                            <a class="md-block" href="http://www.nexologistica.com/" target="_blank">Nexo Logistica</a>
                        </div>
                    </form>
                </md-content>

            </md-whiteframe>
        </div>
    </md-content>
</div>


@endsection
