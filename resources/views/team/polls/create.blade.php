@extends('layouts.team')

@section('content')

    <div ng-controller="pollFormController as ctrl">


        <div class="page-title">
            <h3>
                <i class="fa fa-list"></i> Encuestas
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{ route('team.polls.index', $team->slug) }}">Encuestas</a></li>
                    <li class="active">Crear encuesta</li>
                </ol>
            </div>
        </div>

        <div id="main-wrapper">
            {!!
            Form::model(new \Nexo\Entities\Poll, ['method' => 'POST', 'route' => ['team.polls.store', $team->slug], 'id' => 'nexo-polls-form', 'ng-submit' => 'ctrl.submit()'])
            !!}
            @include('team.polls.partials.form', ['submit_text' => 'Crear encuesta', 'errors' => $errors])
            {!! Form::close() !!}
        </div>

    </div>
@endsection