<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-cog"></i> Configuración
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li><a ui-sref="config.servicesTypes">Categorías de servicios</a></li>

                <li class="active">Editar herramientas de {{item.name}}</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <div class="btn btn-primary btn-addon" ng-click="vm.onCreate()">
            <i class="fa fa-plus"></i>
            Crear herramienta
        </div>
    </div>
</div>

<div id="main-wrapper">
    <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns" ng-if="items.length">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="item in items">
            <td>{{ item.name }}</td>
            <td>{{ item.description }}</td>
            <td>{{ item.created_at.date | amTimeAgo }}</td>
            <td>{{ item.updated_at.date | amTimeAgo }}</td>
            <td style="width: 80px;">
                <a ng-click="vm.onDelete(item)" class="btn btn-default btn-sm" uib-tooltip="Eliminar">
                    <i class="fa fa-trash"></i>
                </a>
                <a ng-click="vm.onEdit(item)" class="btn btn-default btn-sm">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="ta-c" ng-if="!items.length">
        <h3>No hay ninguna herramienta creada.</h3>

        <div class="btn btn-primary" ng-click="vm.onCreate()">Crear la primera</div>
    </div>
</div>