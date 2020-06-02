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
                        <div class="login-box">
                            <a href="{{ url('/') }}" class="text-center" style="display:block;  margin:auto;">
                                @if($team->logo)
                                    <img class="img-responsive" src="{{ $team->present()->logoUrl('medium')  }}" alt="Nexo Logo"
                                         style="margin:auto;"/>
                                @else
                                    <span class="text-lg logo-name">{{$team->name}}</span>
                                @endif
                            </a>

                            <div class="m-t-md">
                                <div class="alert alert-success">
                                    <h3>¡Tu cuenta ya está activa!</h3>
                                    <p>Ingresa a nuestra app con tu email y contraseña para disfrutar de la experiencia Nexo.</p>
                                </div>
                            </div>
                            <p class="text-center m-t-xs text-sm">2015 &copy; Nexo.</p>
                        </div>
                     </md-content>

                </md-whiteframe>
            </div>
        </md-content>
    </div>
@endsection