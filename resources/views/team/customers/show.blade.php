@extends('layouts.master')

@section('content')
    <div class="page-title">
        <h3><i class="fa fa-user"></i> {{ $item->present()->name }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                @if(isset($team))
                    <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                    <li><a href="{{ route('teams.show', $team->id) }}">{{$team->name}}</a></li>
                    <li><a href="{{ route('teams.users.index', $team->id) }}">Usuarios</a></li>
                @else
                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                @endif
                <li class="active">Ver usuario</li>
            </ol>
        </div>
    </div>

    @include('users.partials.show', ['fromTeam' => false])
@endsection
