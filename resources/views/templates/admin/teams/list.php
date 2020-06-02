<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-briefcase"></i> Empresa
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <!--<li><a ui-sref="teams"><i class="fa fa-home"></i></a></li>-->

                <li class="active">Listado de empresas</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <a ui-sref="teams.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear empresa
        </a>
    </div>
</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns" ng-if="items.length">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th class="text-center" uib-tooltip="Cantidad de usuarios" tooltip-append-to-body="true">
                                <i class="fa fa-lg fa-group"></i>
                            </th>
                            <th class="text-center" uib-tooltip="Cantidad de servicios" tooltip-append-to-body="true">
                                <i class="fa fa-lg fa-briefcase"></i>
                            </th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in items">
                            <td>{{ item.id }}</td>
                            <td>
                                <span class="label label-success text-uppercase" ng-if="item.status == 'active'">Activa</span>
                                <span class="label label-danger text-uppercase"  ng-if="item.status == 'inactive'">Inactiva</span>
                            </td>
                            <td>
                                <div class="pull-left" style="width:45px; margin-right:1em;">
                                    <img class="img-responsive img-circle" ng-src="{{ item.logo }}"
                                         alt="Logo"/>
                                </div>

                                <div class="pull-left">
                                    <div>{{ item.name }}</div>
                                    <div>
                                        <a ng-href="{{ item.url }}" target="_blank">
                                            <small class="text-muted">{{ item.slug }}</small>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ item.users_count }}
                            </td>
                            <td class="text-center">
                                {{ item.services_count }}
                            </td>
                            <td>
                                {{ item.created_at.date | amTimeAgo }}
                            </td>
                            <td>
                                {{ item.updated_at.date | amTimeAgo }}
                            </td>
                            <td width="110">
                                <a ui-sref="teams.show({teamId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a ui-sref="teams.edit({teamId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Editar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href ng-click="vm.onDelete(item)" class="btn btn-default btn-sm" uib-tooltip="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="ta-c" ng-if="!items.length">
                        <h3>No hay ninguna empresa creada.</h3>

                        <a class="btn btn-primary" ui-sref="teams.create">Crear la primera</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>