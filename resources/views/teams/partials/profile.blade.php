<div ng-controller="teamController">
    <div class="profile-cover" style="background:#828384; height:100px;">
        <div class="row">
            <div class="col-md-3 profile-image" style="margin-top:30px;">
                <div class="profile-image-container">
                    <img src="{{ $item->present()->logoUrl('150') }}" alt="Logo de {{ $item->name }}" style="background-color:#fff;">
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>{{ $item->services->count() }}</h3>

                    <p>Servicios</p>
                </div>
                <div class=" profile-info-value">
                    <h3>{{ $item->users->count() }}</h3>

                    <p>Usuarios</p>
                </div>
            </div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 user-profile">

                <h3 class="text-center m-t-lg">
                    @if($item->status == 'active')
                        <span class="label label-success label-lg text-uppercase">Empresa activa</span>
                    @elseif($item->status == 'inactive')
                        <span class="label label-danger label-lg text-uppercase">Empresa inactiva</span>
                    @endif
                </h3>


                <h3 class="text-center">{{ $item->name  }}</h3>

                <p class="text-center"><a href="{{ $item->present()->url }}" target="_blank">{{ $item->present()->url }}</a></p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Creado <span am-time-ago="'{{ $item->created_at }}'"></span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Modificado <span am-time-ago="'{{ $item->updated_at }}'"></span>
                        </p>
                    </li>
                </ul>
                <hr>

                @if($asAdmin)
                    <a href="{{ route('teams.edit', $item->id)  }}" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-pencil m-r-xs"></i> Editar
                    </a>

                    <div class="btn btn-{{ $item->status == 'active' ? 'warning' : 'success' }} btn-lg btn-block" nexo-change-status
                         data-url="{{ route('teams.change-status', $item->id) }}"
                         data-new-status="{{ $item->status == 'active' ? 'inactive' : 'active' }}"
                         data-confirm-text="¿Está seguro de que quiere cambiar el estado de la empresa?">
                        <i class="fa fa-arrow-{{ $item->status == 'active' ? 'down' : 'up' }} m-r-xs">

                        </i> {{ $item->status == 'active' ? 'Desactivar' : 'Activar' }}
                    </div>

                    <a href="{{ route('teams.destroy', $item->id)  }}" class="btn btn-danger btn-lg btn-block" nexo-delete-button>
                        <i class="fa fa-remove m-r-xs"></i> Eliminar
                    </a>
                @endif
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Últimos usuarios registrados</h3>
                            </div>
                            <div class="panel-body">
                                @if($item->users->isEmpty())
                                    <h4 class="m-t-lg text-center">Ningún usuario registrado</h4>
                                @endif

                                <div class="inbox-widget" style="height:auto!important;">
                                    @foreach($item->users()->take(3)->orderBy('created_at', 'desc')->get() as $user)
                                        <a href="{{ route('users.show', $user->id) }}">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img">
                                                    <img src="{{ $user->present()->avatarUrl('150') }}" class="img-circle" alt="">
                                                </div>
                                                <p class="inbox-item-author">
                                                    {{ $user->present()->name }}
                                                </p>

                                                <p class="inbox-item-text" style="margin-left:56px;">
                                                    {{ $user->email  }}
                                                    <br>

                                                    @foreach($user->roles as $role)
                                                        <span class="label label-default text-uppercase">{{ $role->name  }}</span>
                                                    @endforeach
                                                </p>

                                                <p class="inbox-item-date">
                                                    <span am-time-ago="'{{ $user->created_at  }}'"></span>
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            @if(!$item->users->isEmpty())
                                <div class="panel-footer text-center">
                                    <a class="btn btn-default btn-block" href="{{ $asAdmin ? route('teams.users.index', $item->id) : route('team.users.index', $item->slug) }}">
                                        Ver todos</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Últimos servicios creados</h3>
                            </div>
                            <div class="panel-body">
                                @if($item->services->isEmpty())
                                    <h4 class="m-t-lg text-center">Ningún servicio creado</h4>
                                @endif
                                <div class="inbox-widget" style="height:auto!important;">
                                    @foreach($item->services()->take(5)->orderBy('created_at', 'desc')->get() as $service)
                                        <div class="inbox-item">
                                            <p class="inbox-item-author">
                                                {{ $service->type->name }}
                                            </p>

                                            <p class="inbox-item-text">
                                                {{ $service->customer->present()->name  }}
                                            </p>

                                            <p class="inbox-item-date">
                                                <span am-time-ago="'{{ $service->created_at  }}'"></span>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if(!$item->users->isEmpty())
                                <div class="panel-footer text-center">
                                    <a class="btn btn-default btn-block" href="{{ route('team.services.index', $item->slug) }}">
                                        Ver todos
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @if($asAdmin)
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Módulos</h3>
                        </div>
                        <table class="table table-hover">

                            <tbody>
                            @foreach($modules as $module)
                                <tr>
                                    <td>
                                        <span>
                                            {{$module->name}}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->modules->find($module->id))
                                            <span class="label label-success text-uppercase">Activado</span>
                                        @else
                                            <span class="label label-danger text-uppercase">Desactivado</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Límites por rol</h3>
                        </div>
                        @if(!$item->rolesLimits->isEmpty())
                            <table class="table table-hover">
                                <tbody>
                                @foreach($item->rolesLimits as $roleLimit)
                                    <tr>
                                        <td>
                                            {{$roleLimit->role->name}}
                                        </td>
                                        <td>
                                            {{$roleLimit->limit}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="panel-body">
                                <h4 class="m-t-lg text-center">No hay límites definidos para esta empresa.</h4>
                            </div>
                        @endif
                    </div>
                @endif

                @include('partials.history', ['historyItems' => $item->revisionHistory->sortByDesc('created_at')->take(5)])
            </div>
        </div>
    </div>
</div>