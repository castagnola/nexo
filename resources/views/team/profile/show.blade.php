@extends('layouts.team')

@section('content')
    <div class="page-title">
        <h3><i class="fa fa-user"></i> Perfil</h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li class="active">{{ $profile->present()->name  }}</li>
            </ol>
        </div>
    </div>


    @include('profile.partials.profile')
@endsection
