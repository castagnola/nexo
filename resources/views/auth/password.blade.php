@extends('layouts.unlogged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ url('/') }}" class="text-center" style="display:block; max-width: 100px; margin:auto;">
                    <img class="img-responsive" src="{{ route('imagecache', ['original', 'nexo-logo.png'])  }}" alt="Nexo Logo"
                         style="margin:auto;"/>
                </a>



                <div class="panel panel-white mt-xl">
                    <div class="panel-heading">Recuperar contraseña</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Algo pasó mientras se intentaba la recuperación:</strong> <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (count($success) > 0)
                            <div class="alert alert-success">
                                <ul class="nav">
                                    @foreach ($success->all() as $error)
                                        <li>{{ $success }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="m-t-md" role="form" method="POST" action="{{ url('/password/email') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 pt-l">
                                    <button type="submit" class="btn btn-danger">
                                        Recuperar contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection