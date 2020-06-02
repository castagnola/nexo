@extends('layouts.unlogged')

@section('content')

<div layout="column" flex id="login-container" role="main" ng-controller="loginController">
    <md-content class="animated fadeIn" layout="row" flex ng-if="showForm">
        <div layout="row" layout-align="center center" layout-fill style="height: 100%;">

            <md-whiteframe class="md-whiteframe-z1 animated fadeInUp" layout="column" flex="30" flex-xs="90">
                <md-toolbar>
                    <div class="md-toolbar-tools">Tu contraseña ha sido restaurada.</div>
                </md-toolbar>
                <md-content layout-padding>
                    <div class="success">
                        <h3 class="text-center">Ahora puedes ingresar a nuestras aplicaciones con tu email y la nueva contraseña que elegiste.</h3>
                    </div>

                    <div layout="column" layout-align="center center" class="layout-align-center-center layout-column">
                        <p class="text-center m-t-xs text-sm">2015 © Nexo.</p>
                    </div>

                    <div layout="column" layout-align="center center" class="layout-align-center-center layout-column">
                        <md-button class="md-block md-raised md-primary" href="{{ url('/login') }}">Ingresar</md-button>
                    </div>
                </md-content>

            </md-whiteframe>
        </div>
    </md-content>
</div>


<style>
.success {
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #dff0d8;
        margin: 1em;
    }
</style>

@endsection