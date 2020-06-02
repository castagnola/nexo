@extends('layouts.master')

@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3><i class="fa fa-briefcase"></i> Empresas</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                    <li class="active">Listado de empresas</li>
                </ol>
            </div>
        </div>
        @if(!$items->isEmpty())
            <div class="pull-right">
                <a class="btn btn-primary  btn-addon" href="{{ route('teams.create') }}">
                    <i class="fa fa-plus"></i>
                    Crear empresa
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Estado</th>
                                        <th>Nombre</th>
                                        <th class="text-center">
                                            <span tooltip="Cantidad de usuarios">
                                                <i class="fa fa-lg fa-group"></i>
                                            </span>
                                        </th>
                                        <th class="text-center">
                                            <span tooltip="Cantidad de servicios">
                                                <i class="fa fa-lg fa-briefcase"></i>
                                            </span>
                                        </th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th>Ultima actividad</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>

                                            <td>
                                                @if($item->status == 'active')
                                                    <span class="label label-success text-uppercase">Activa</span>
                                                @elseif($item->status == 'inactive')
                                                    <span class="label label-danger text-uppercase">Inactiva</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="pull-left" style="width:45px; margin-right:1em;">
                                                    <img class="img-responsive img-circle" src="{{ $item->present()->logoUrl('150')  }}"
                                                         alt="Logo"/>
                                                </div>

                                                <div class="pull-left">
                                                    <div>{{ $item->name }}</div>
                                                    <div>
                                                        <a href="{{ $item->present()->url }}" target="_blank">
                                                            <small class="text-muted">{{ $item->slug }}</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $item->users->count() }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->services->count() }}
                                            </td>
                                            <td><span am-time-ago="'{{ $item->created_at  }}'"></span></td>
                                            <td><span am-time-ago="'{{ $item->updated_at  }}'"></span></td>
                                            <td>
                                                @if($item->present()->last_activity) <span am-time-ago="'{{ $item->updated_at  }}'"></span> @else Nunca @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-default" href="{{ route('teams.show', $item->id) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Ver más">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-default" href="{{ route('teams.users.index', $item->id) }}"
                                                       data-toggle="tooltip" data-placement="top" title="Usuarios">
                                                        <i class="fa fa-user"></i>
                                                    </a>

                                                    <a class="btn btn-default" href="{{ route('teams.edit', $item->id) }}"
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
                    <div class="text-center">
                        <h3>No hay ninguna empresa creada</h3>
                        <a class="btn btn-primary  btn-addon" href="{{ route('teams.create') }}">
                            <i class="fa fa-plus"></i>
                            Crear la primera
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection