@extends('layouts.unlogged')

@section('content')
    <div class="row">
        <div class="col-md-6 center">
            <div class="login-box">
                <a href="{{ url('/') }}" class="text-center" style="display:block; max-width: 100px; margin:auto;">
                    <img class="img-responsive" src="{{ route('imagecache', ['original', 'nexo-logo.png'])  }}" alt="Nexo Logo"
                         style="margin:auto;"/>
                </a>

                @if (count($errors) > 0)
                    <div class="alert alert-danger mt">
                        <strong>Algo pasó mientras se intentaba el cambio de contraseña:</strong> <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form  class="form-horizontal pt-l" role="form" method="POST" action="{{ url('/password/reset') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo electrónico</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nueva contraseña</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirme la nueva contraseña</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-danger">
                                Resetear contraseña
                            </button>
                        </div>
                    </div>
                </form>
                <p class="text-center m-t-xs text-sm">2015 &copy; Nexo.</p>
            </div>
        </div>
    </div>

@endsection