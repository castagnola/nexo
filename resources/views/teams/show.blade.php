@extends('layouts.master')

@section('content')
    <div>
        <div class="page-title">
            <h3><i class="fa fa-briefcase"></i> {{ $item->name }}</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                    <li><a href="{{ route('teams.index') }}">Empresas</a></li>
                    <li class="active">Ver empresa</li>
                </ol>
            </div>
        </div>

        @include('teams.partials.profile', ['item' => isset($team) ? $team : $item, 'asAdmin' => true])
    </div>
@endsection
