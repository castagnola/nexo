@extends('layouts.unlogged')

@section('content')

<div layout="column" flex id="login-container" role="main" ng-controller="loginController">
    <md-content class="animated fadeIn" layout="row" flex ng-if="showForm">
        <div layout="row" layout-align="center center" layout-fill style="height: 100%;">

            <md-whiteframe class="md-whiteframe-z1 animated fadeInUp" layout="column" flex="30" flex-xs="90">
                <md-toolbar>
                    <div class="md-toolbar-tools">Reestablecer contraseña</div>
                </md-toolbar>
                <md-content layout-padding>

                    @if(isset($errors))
                        @if (count($errors) > 0)
                            <?php 
                                $all = $errors->all();
                            ?>
                            <?php if(array_key_exists('errors', $all)){ ?>
                                <md-input-container class="md-block errors">
                                    <strong>Algo pasó mientras se intentaba el ingreso:</strong> <br><br>
                                    <ul>
                                        @foreach ($all['errors'] as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </md-input-container>
                            <?php } ?>
                            <?php if(array_key_exists('success', $all)){ ?>
                                <md-input-container class="md-block success">
                                        @foreach ($all['success'] as $error)
                                            {{ $error }}
                                        @endforeach
                                </md-input-container>
                            <?php } ?>
                        @endif
                    @endif


                    <form id="nexo-reset-form" role="form" method="POST" action="{{ url('/password/resets') }}" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <md-input-container class="md-block" md-no-float>
                            <label>Correo electrónico</label>
                            <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                        </md-input-container>
                        <md-input-container class="md-block" md-no-float>
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="password">
                        </md-input-container>
                        <md-input-container class="md-block" md-no-float>
                            <label>Confirmación de contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </md-input-container>
                        <div layout="column" layout-align="center center">
                            <md-button type="submit" class="md-block md-raised md-primary" flex-sm="100">Guardar nueva contraseña</md-button>
                        </div>
                    </form>
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