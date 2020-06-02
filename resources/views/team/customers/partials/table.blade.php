<div class="table-responsive">
    <table class="table table-hover">
        <colgroup>
            <col>
            <col>
            <col style="width: 320px;">
            <col>
            <col>
            <col>
            <col>
            <col style="width: 100px;">
        </colgroup>
        <thead>
        <tr>
            <th>#</th>
            <th>Estado</th>
            <th>Nombre</th>
            <th>Grupos</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Último ingreso</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>
                    @if($item->isActive())
                        <span class="label label-success  text-uppercase">Activo</span>
                    @else
                        <span class="label label-danger  text-uppercase">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="pull-left" style="width:35px; margin-right:1em;">
                        <img class="img-responsive img-circle" src="{{ $item->present()->avatarUrl('150')  }}"
                             alt="Avatar {{ $item->present()->name }}"/>
                    </div>

                    <div class="pull-left">
                        <div><strong>{{ $item->present()->name }}</strong></div>
                        <div><i class="fa fa-envelope"></i> <span>{{ $item->email }}</span></div>
                    </div>
                </td>
                <td>
                    @foreach($item->roles as $role)
                        <span class="label label-default text-uppercase">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td><span am-time-ago="'{{ $item->created_at }}'"></span></td>
                <td><span am-time-ago="'{{ $item->updated_at }}'"></span></td>
                <td>
                    @if($item->last_login)
                        <span am-time-ago="'{{ $item->last_login }}'"></span>
                    @else
                        <span>Nunca</span>
                    @endif
                </td>
                <td class="text-right" valign="middle">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default"
                           href="{{ isset($team) && !$fromTeam ? route('teams.users.show', [$team->id, $item->id]) : route('users.show', [$item->id]) }}"
                           data-toggle="tooltip" data-placement="top" title="Ver más">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a class="btn btn-default"
                           href="{{ isset($team) && !$fromTeam ? route('teams.users.edit', [$team->id, $item->id]) : route('users.edit', [$item->id]) }}"
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