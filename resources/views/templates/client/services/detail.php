<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-briefcase nexo-service-{{service.status.slug}} only-color"></i>
            Servicio #{{service.code}}
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                <li><a ui-sref="services">Servicios</a></li>

                <li class="active">Detalle del servicio</li>
            </ol>
        </div>
    </div>


    <div class="pull-right">
        <div class="btn-group" uib-dropdown>
            <button id="single-button" type="button" class="btn btn-primary" uib-dropdown-toggle ladda="vm.changingStatus">
                Cambiar de estado <span class="caret"></span>
            </button>
            <ul class="uib-dropdown-menu" role="menu" aria-labelledby="single-button">
                <li role="menuitem" ng-repeat="status in statuses" ng-if="status.id != service.status.id" ng-click="vm.onChangeStatus(status.id)">
                    <a href>{{ status.name }}</a>
                </li>
            </ul>
        </div>

        <a ui-sref="services.edit({serviceId:service.id})" class="btn btn-primary btn-addon">
            <i class="fa fa-pencil"></i>
            Editar
        </a>

        <a ui-sref="services.reasign({serviceId:service.id})" class="btn btn-primary btn-addon">
            <i class="fa fa-group"></i>
            Reasignar
        </a>
    </div>


</div>

<div id="main-wrapper">
    <div class="row">
        <div class="col-sm-6">
            <div class="stats-info">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del cliente</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Nombre</strong>
                                <span class="fl-r">{{service.customer.name }}</span>
                            </li>
                            <li>
                                <strong>Documento</strong>
                                <span class="fl-r">{{service.customer.document_formatted }}</span>
                            </li>
                            <li>
                                <strong>Email</strong>
                                <span class="fl-r">{{service.customer.email }}</span>
                            </li>
                            <li ng-repeat="phone in service.customer.phones.data">
                                <strong>Teléfono {{ $index+1 }}</strong>
                                <span class="fl-r">{{ phone.phone }}</span>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dirección</h3>
                    </div>
                    <div class="panel-body">
                        <div>{{service.address }}</div>
                        <div>{{service.city.name }}</div>

                        <div class="mt">
                            <img class="img-responsive" ng-src="{{service.map}}" alt="Map Static">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="stats-info">

                <div class="panel panel-white" ng-if="service.users.data.length">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ruteros asignados</h3>
                    </div>
                    <table class="table table-hover" ng-if="service.users.data">
                        <tbody>
                        <tr ng-repeat="user in service.users.data">
                            <td style="width: 60px">
                                <img ng-src="{{user.avatar[150]}}" class="img-responsive">
                            </td>
                            <td>
                                {{ user.name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del servicio</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Estado</strong>

                                <div class="fl-r">
                                    <span class="label nexo-service-{{service.status.slug}}">{{service.status.name}}</span>
                                </div>
                            </li>

                            <li>
                                <strong>Código del servicio</strong>
                                <span class="fl-r">{{service.code }}</span>
                            </li>


                            <li>
                                <strong>Código de verificación</strong>
                                <span class="fl-r">{{service.verification_code }}</span>
                            </li>

                            <li>
                                <strong>Categoría</strong>
                                <span class="fl-r">{{service.type.name }}</span>
                            </li>

                            <li ng-repeat="item in service.items.data" style="min-height: 43px">
                                <strong ng-show="$first">Items</strong>
                                <span class="fl-r">
                                    {{ item.name }}
                                </span>
                            </li>


                            <li ng-if="!!service.observations">
                                <strong>Observaciones</strong>
                                <span class="fl-r">{{service.observations }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Programación del servicio</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <strong>Tipo de programación</strong>
                                <span class="fl-r">{{service.date_type == 'schedule' ? 'Programado' : 'Inmediato' }}</span>
                            </li>

                            <li>
                                <strong>Tipo de asignación</strong>
                                <span class="fl-r">{{service.assignment_type == 'mandatory' ? 'Obligatorio' : 'Por demanda' }}</span>
                            </li>

                            <li>
                                <strong>Inicia</strong>
                                <span class="fl-r">{{service.start_at.date | amDateFormat:'LLLL' }}</span>
                            </li>

                            <li>
                                <strong>Finaliza</strong>
                                <span class="fl-r">{{service.end_at.date | amDateFormat:'LLLL' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="panel panel-white" ng-if="!service.users.data.length">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ruteros preasignados</h3>
                    </div>
                    <div class="panel-body" ng-if="!service.assignments.data.length">
                        <p class="ta-c">No hay ruteros preasignados</p>
                    </div>
                    <table class="table table-hover" ng-if="service.assignments.data">
                        <tbody>
                        <tr ng-repeat="assignment in service.assignments.data">
                            <td style="width: 60px">
                                <img ng-src="{{assignment.user.avatar[150]}}" class="img-responsive">
                            </td>
                            <td>
                                {{ assignment.user.name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>