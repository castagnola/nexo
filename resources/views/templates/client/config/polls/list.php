<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-cog"></i> Encuestas
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Configuración</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <a ui-sref="config.polls.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear encuesta
        </a>
    </div>
</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="ta-c" ng-if="!items.length">
                        <h3>No hay ninguna encuesta creada. Los clientes no podrán calificar los servicios.</h3>

                        <a ui-sref="config.polls.create" class="btn btn-primary">Crear la primera</a>
                    </div>

                    <div class="alert alert-warning" ng-show="vm.showDontHaveActivePolls && items.length">
                        <h4>¡No tiene ninguna encuesta activada!</h4>
                        <p>Esto significa que los clientes no podrán calificar cada servicio. Use el botón "Activar" para completar esta acción.</p>
                    </div>


                    <div ng-if="items.length">
                        <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns">
                            <thead>
                            <tr>
                                <th>Activar</th>
                                <th>Nombre</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th># Preguntas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in items">
                                <td>
                                    <div class="btn btn-success" ng-if="item.is_active" ng-click="vm.onDesactive(item)">
                                        <i class="fa fa-check"></i> Activada
                                    </div>
                                    <div class="btn btn-default" ng-if="!item.is_active" ng-click="vm.onActive(item)">
                                        Activar
                                    </div>
                                </td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.created_at.date | amTimeAgo }}</td>
                                <td>{{ item.updated_at.date | amTimeAgo }}</td>
                                <td>{{ item.questions_counter }}</td>
                                <td width="100">
                                    <a ui-sref="config.polls.edit({pollId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a ng-click="vm.onDelete(item)" class="btn btn-default btn-sm" uib-tooltip="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>