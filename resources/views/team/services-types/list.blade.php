@extends('layouts.team')

@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>Tipos de servicio</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Listado</li>
                </ol>
            </div>
        </div>
        @if(!$items->isEmpty())
            <div class="pull-right">
                <a class="btn btn-primary  btn-addon" href="{{ route('team.services-types.create', $team->slug) }}">
                    <i class="fa fa-plus"></i>
                    Crear tipo de servicio
                </a>
            </div>
        @endif
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">

                @if(!$items->isEmpty())
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Listado de empresas</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tiempo de respuesta</th>
                                        <th>Items</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <th>
                                                {{ $item->avg_response_time }}
                                            </th>

                                            <td>{{ $item->items()->count() }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                                            <td class="text-right">
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-default"
                                                       href="{{ route('team.services-types.show', [$team->slug, $item->id]) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Ver más">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-default"
                                                       href="{{ route('team.services-types.services-items.index', [$team->slug, $item->id]) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Items">
                                                        <i class="fa fa-list"></i>
                                                    </a>

                                                    <a class="btn btn-default"
                                                       href="{{ route('team.services-types.edit',[$team->slug, $item->id]) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="btn btn-default"
                                                       href="{{ route('team.services-types.destroy',[$team->slug, $item->id]) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Eliminar" nexo-delete-button>
                                                        <i class="fa fa-trash"></i>
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
                    <div class="text-center">
                        <h3>No hay ningún tipo de servicio creado</h3>
                        <a class="btn btn-primary  btn-addon" href="{{ route('team.services-types.create', $team->slug) }}">
                            <i class="fa fa-plus"></i>
                            Crear el primero
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection