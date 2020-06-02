<div ng-controller="userController" class="pos-r">

    <div class="profile-cover" style="background:#828384; height:100px;">
        <div class="row">
            <div class="col-md-3 profile-image" style="margin-top:30px;">
                <div class="profile-image-container">
                    <img src="{{ $item->present()->avatarUrl('150') }}" alt="Avatar de {{ $item->present()->name }}"
                         style="background-color:#fff;">
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>{{$item->services->count()}}</h3>

                    <p>Servicios</p>
                </div>
            </div>
        </div>
    </div>


    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 user-profile">
                <h3 class="text-center m-t-lg">
                    @if($item->isActive())
                        <span class="label label-success label-lg text-uppercase">Usuario activo</span>
                    @else
                        <span class="label label-danger label-lg text-uppercase">Usuario inactivo</span>
                    @endif
                </h3>

                <h3 class="text-center">
                    {{ $item->present()->name }}
                </h3>

                <div class="text-center">
                    @foreach($item->roles as $role)
                        <span class="label label-default text-uppercase mb-s d-ib">{{ $role->name }}</span>
                    @endforeach
                </div>

                <hr>

                <ul class="list-unstyled text-center" ng-hide="nexoform.$visible">
                    <li>
                        <p>
                            <i class="fa fa-envelope m-r-xs"></i>
                            {{ $item->email }}
                        </p>
                    </li>
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
                    @if($item->last_login)
                        <li>
                            <p>
                                <i class="fa fa-calendar m-r-xs"></i>
                                Último ingreso <span am-time-ago="'{{ $item->last_login }}'"></span>
                            </p>
                        </li>
                    @endif
                </ul>

                <hr>

                <a href="{{ isset($team) && !$fromTeam ? route('teams.users.edit', [$team->id, $item->id]) : route('users.edit', $item->id) }}"
                   class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-pencil m-r-xs"></i> Editar
                </a>

                <div class="btn btn-{{ $item->isActive() ? 'warning' : 'success' }} btn-lg btn-block" nexo-change-status
                     data-url="{{ route('users.change-status', $item->id) }}"
                     data-new-status="{{ $item->isActive() ? 'inactive' : 'active' }}"
                     data-confirm-text="¿?"
                     data-return-url="{{ isset($team) && !$fromTeam ? route('team.users.show', [$team->id, $item->id]) : route('users.show', $item->id) }}">
                    <i class="fa fa-arrow-{{ $item->isActive() ? 'down' : 'up' }} m-r-xs">

                    </i> {{ $item->isActive() ? 'Desactivar' : 'Activar' }}
                </div>

                <a href="{{ route('users.destroy', $item->id)  }}" class="btn btn-danger btn-lg btn-block" nexo-delete-button>
                    <i class="fa fa-remove m-r-xs"></i> Eliminar
                </a>
            </div>

            <div class="col-md-4">
                @include('users.partials.contact', ['contactData' => $item->contactData])
            </div>


            <div class="col-md-4">
                @include('partials.history', ['historyItems' => $item->revisionHistory->sortByDesc('created_at'), 'createdAt' => $item->created_at])
            </div>
        </div>
    </div>
</div>