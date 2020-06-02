@extends('layouts.team')

@section('title')
    Creación de servicios no habilitado.
@endsection

@section('content')
    <div id="main-wrapper">
        <div class="ta-c pt-xl">
            <i class="fa fa-exclamation-triangle fa-4x"></i>

            <h3>No es posible crear servicios ya que no hay tipos de servicios creados.</h3>

            @if($showCreateButton)
                <a class="btn btn-primary btn-lg" href="{{route('team.services-types.create', $team->slug)}}">Crear el primer tipo de servicio</a>
            @endif
        </div>
    </div>
@endsection