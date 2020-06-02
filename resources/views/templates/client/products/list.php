<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-group"></i> Productos
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Listado de productos</li>
            </ol>
        </div>
    </div>


    <div class="pull-right">
        <a ui-sref="products.import" class="btn btn-default btn-addon">
            <i class="fa fa-arrow-up"></i>
            Importar
        </a>
        <a ui-sref="products.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear producto
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
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th># Servicios</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in items">
                            <td>{{ item.id }}</td>
                            <td>{{ item.first_name }}</td>
                            <td>{{ item.last_name }}</td>
                            <td>{{ item.document_formatted }}</td>
                            <td>{{ item.email }}</td>

                            <td>
                                <span class="text-ellipsis text-ellipsis-with-hover" style="width: 180px;">{{ item.addresses[0].address }}</span>
                            </td>
                            <td>{{ item.phones[0].phone }}</td>
                            <td>{{ item.services_count }}</td>

                            <td>
                                {{ item.created_at.date | amTimeAgo }}
                            </td>
                            <td>
                                {{ item.updated_at.date | amTimeAgo }}
                            </td>
                            <td>
                                <a ui-sref="products.edit({customerId:item.id})" class="btn btn-default btn-sm">
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
                        <h3>No hay ningún producto creado.</h3>

                        <a class="btn btn-primary" ui-sref="products.create">Crear el primero</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>