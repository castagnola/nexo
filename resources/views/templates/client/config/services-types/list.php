<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-cog"></i> Configuración
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Categorías de servicios</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <a ui-sref="config.servicesTypes.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear categoría
        </a>
    </div>

</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th># Items</th>
                            <th># Campos</th>
                            <th>Tiempo de respuesta</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in items">
                            <td>{{ item.name }}</td>
                            <td>{{ item.created_at.date | amTimeAgo }}</td>
                            <td>{{ item.updated_at.date | amTimeAgo }}</td>
                            <td>{{ item.items_count }}</td>
                            <td>{{ item.fields_count }}</td>
                            <td>{{ item.response_time | amDurationFormat }}</td>
                            <td>
                                <a ui-sref="config.servicesTypes.edit.items({serviceTypeId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Editar herramientas">
                                    <i class="fa fa-list"></i>
                                </a>
                                <a ui-sref="config.servicesTypes.edit.form({serviceTypeId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Editar especificaciones">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <a ui-sref="config.servicesTypes.edit({serviceTypeId:item.id})" class="btn btn-default btn-sm" uib-tooltip="Editar categoría de servicio">
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