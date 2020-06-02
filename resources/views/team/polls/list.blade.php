@extends('layouts.team')

@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-list"></i> Encuestas
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Listado de encuestas</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary  btn-addon" href="{{ route('team.polls.create', $team->slug) }}">
                <i class="fa fa-plus"></i>
                Crear encuesta
            </a>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                @if(!$items->isEmpty())
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Listado de encuestas</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Preguntas</th>
                                        <th>Creada</th>
                                        <th>Modificado</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <th scope="row">{{ $item->name }}</th>
                                            <td>{{ $item->questions->count()  }}</td>
                                            <td>
                                                <span am-time-ago="'{{ $item->created_at }}'"></span>
                                            </td>
                                            <td>
                                                <span am-time-ago="'{{ $item->updated_at }}'"></span>
                                            </td>
                                            <td class="text-right" valign="middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-default"
                                                       href="{{ route('team.polls.show', [$team->slug, $item->id]) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Ver más">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-default"
                                                       href=""
                                                       data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center pt pb">
                        <i class="fa fa-list fa-4x"></i>

                        <h3>Ninguna encuesta creada.</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection