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

                            @if(isset($errors))
                                @if (count($errors) > 0)
                                    <md-input-container class="md-block errors">
                                        <strong>Algo pasó mientras se intentaba el ingreso:</strong> <br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </md-input-container>
                                @endif
                            @endif

                            <p class="text-center">
                                    Solamente necesitamos una contraseña para que tu cuenta con el correo <strong>{{$user->email}}</strong> quede activa.
                            </p>

                            <form id="nexo-login-form" method="POST" class="m-t-md" action="{{ $url }}" role="form" autocomplete="off">

                                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                <md-input-container class="md-block" md-no-float>
                                    <label>Contraseña</label>
                                    <input name="password" type="password" class="form-control input-lg" placeholder="Contraseña" required>
                                 </md-input-container>
                                <md-input-container class="md-block" md-no-float>
                                    <label>Repite contraseña</label>
                                    <input name="password_confirmation" type="password" class="form-control input-lg" placeholder="Repite contraseña" required>
                                </md-input-container>
                                <md-button type="submit" class="md-block md-raised md-primary" flex-sm="100">Ingresar</md-button>
                                <!-- <button type="submit" class="btn btn-danger btn-block btn-lg">Ingresar</button> -->
                            </form>
                            <p class="text-center">2017 &copy; Nexo.</p>
                        </div>
                    </md-content>

                </md-whiteframe>
            </div>
        </md-content>
    </div>
@endsection