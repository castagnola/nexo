<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-briefcase"></i> Servicios
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Listado de servicios</li>
            </ol>
        </div>
    </div>

    <div class="pull-right">
        <a ui-sref="services.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear servicio
        </a>
    </div>
</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Listado de servicios</h4>
                </div>



                <div class="panel-body">

                    <div class="ta-c" ng-if="!items.length">
                        <h3>No hay ningún servicio creado.</h3>

                        <a class="btn btn-primary" ui-sref="services.create">Crear el primero</a>
                    </div>


                    <table datatable="ng" dt-options="vm.dtOptions" class="table row-border hover" dt-column-defs="vm.dtColumns" ng-if="items.length">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Cliente</th>
                            <th>Documento del cliente</th>
                            <th>Despachador</th>
                            <th># Ruteros</th>
                            <th>Programado</th>
                            <th>Fecha de programación</th>
                            <th># Preasignaciones</th>
                            <th>Creado</th>
                            <th>Modificado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in items">
                            <td>
                                {{ item.code }}
                            </td>
                            <td>
                                {{ item.name }}
                            </td>
                            <td>
                                <span class='label nexo-service-{{ item.status.slug }}'>{{ item.status.name }}</span>
                            </td>
                            <td>
                                {{ item.customer.name }}
                            </td>
                            <td>
                                {{ item.customer.document }}
                            </td>
                            <td>
                                {{ item.creator.name }}
                            </td>
                            <td>
                                {{ item.users_count }}
                            </td>
                            <td>
                                {{ item.start_at.date | amTimeAgo }}
                            </td>
                            <td>
                                {{ item.start_at.date | amDateFormat:'LLL' }}
                            </td>
                            <td>
                                {{ item.assignments_count }}
                            </td>
                            <td>
                                {{ item.created_at.date | amTimeAgo }}
                            </td>
                            <td>
                                {{ item.updated_at.date | amTimeAgo }}
                            </td>
                            <td width="80">
                                <div class="btn-group" uib-dropdown is-open="status.isopen">
                                    <button type="button" class="btn btn-default" uib-dropdown-toggle>
                                        Acciones <span class="caret"></span>
                                    </button>
                                    <ul class="uib-dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="single-button">
                                        <li role="menuitem"><a ui-sref="services.detail({serviceId:item.id})">Ver más</a></li>
                                        <li role="menuitem"><a ui-sref="services.reasign({serviceId:item.id})">Reasignar</a></li>
                                        <li role="menuitem"><a ui-sref="services.edit({serviceId:item.id})">Editar información</a></li>
                                        <li role="menuitem"><a ng-click="vm.onDelete(item)">Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>