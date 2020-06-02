@extends('layouts.team')

@section('content')
    <div class="page-title">
        <h3><i class="fa fa-user"></i> {{ $item->present()->name }}</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li class="active">Ver usuario</li>
            </ol>
        </div>
    </div>

    @include('users.partials.show', ['fromTeam' => true])
@endsection