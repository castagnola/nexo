<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-user"></i> Usuarios
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Listado de usuarios</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <a ui-sref="users.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear usuario
        </a>
    </div>
</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Listado de usuarios</h4>
                </div>

                <div class="panel-body">
                    <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns" ng-if="users.length">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Activo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="user in users">
                            <td>{{ user.id }}</td>
                            <td>
                                <img class='img-responsive img-circle' ng-src='{{ user.avatar[150] }}' style='width: 40px;margin:auto;'/>
                            </td>
                            <td>
                                <span class="label label-success" ng-if="user.active">Activo</span>
                                <span class="label label-danger" ng-if="!user.active">Inactivo</span>
                            </td>
                            <td>{{ user.first_name }}</td>
                            <td>{{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <span class="label label-default" ng-repeat="role in user.roles track by $index">{{role}}</span>
                            </td>
                            <td>
                                {{ user.created_at.date | amTimeAgo }}
                            </td>
                            <td>
                                {{ user.updated_at.date | amTimeAgo }}
                            </td>
                            <td width="100">
                                <a ui-sref="users.edit({userId:user.id})" class="btn btn-default btn-sm" uib-tooltip="Editar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href ng-click="vm.onDelete(user)" class="btn btn-default btn-sm" uib-tooltip="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="ta-c" ng-if="!users.length">
                        <h3>No hay ningún usuario creado.</h3>

                        <a class="btn btn-primary" ui-sref="users.create">Crear el primero</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>