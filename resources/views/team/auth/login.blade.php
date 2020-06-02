@extends('layouts.unlogged')

@section('content')
    <div class="row">
        <div class="col-md-3 center">
            <div class="login-box">
                <a href="{{ url('/') }}" class="text-center" style="display:block;  margin:auto;">
                    @if($team->logo)
                        <img class="img-responsive" src="{{ $team->present()->logoUrl('medium')  }}" alt="Nexo Logo"
                             style="margin:auto;"/>
                    @else
                        <span class="text-lg logo-name">{{$team->name}}</span>
                    @endif
                </a>

                @if (count($errors) > 0)
                    <div class="alert alert-danger mt-l">
                        <strong>Algo pasó mientras se intentaba el ingreso:</strong> <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="nexo-login-form" method="POST" class="m-t-md" action="{{ url('auth/login') }}" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <div class="form-group">
                        <input name="email" type="email" class="form-control input-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control input-lg" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block btn-lg">Ingresar</button>
                    <a href="forgot.html" class="display-block text-center m-t-md text-sm">¿Olvidó su contraseña?</a>
                </form>
                <p class="text-center m-t-xs text-sm">2015 &copy; Nexo.</p>
            </div>
        </div>
    </div>
@endsection