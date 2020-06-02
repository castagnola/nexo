@extends('layouts.team')

@section('content')
    <div class="page-title">
        <h3><i class="fa fa-briefcase"></i> {{ $service->type->name }} - <span class="text-muted">{{ $service->code }}</span></h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a href="{{ route('team.services.index', [$team->slug]) }}">Servicios</a></li>
                <li class="active">Ver servicio</li>
            </ol>
        </div>
    </div>

    <div  id="main-wrapper" ng-controller="serviceController as ctrl">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del cliente</h3>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Nombres</strong>
                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.customer.data.first_name"></span>
                            </p>
                        </div>
                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Apellidos</strong>

                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.customer.data.last_name"></span>
                            </p>
                        </div>
                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Email</strong>

                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.customer.data.email"></span>
                            </p>
                        </div>
                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Documento</strong>

                            <p class="list-group-item-text">
                                <span class="text-uppercase" ng-bind="ctrl.service.customer.data.document_type"></span>
                                - <span ng-bind="ctrl.service.customer.data.document"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ubicación del servicio</h3>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="list-group-item-heading">
                                <strong ng-bind="ctrl.service.address"></strong><br>
                                <span ng-bind="ctrl.service.city.data.name"></span>, <span class="text-muted" ng-bind="ctrl.service.city.data.state.data.name"></span>
                            </div>

                            <p class="list-group-item-text mt">
                                <img class="img-responsive" ng-src="@{{ ctrl.service.map }}"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del servicio</h3>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item">

                            <strong class="list-group-item-heading">Código de verificación</strong>

                            <p class="list-group-item-text">
                                <pre ng-bind="ctrl.service.verification_code"></pre>
                            </p>
                        </div>
                        <div class="list-group-item">

                            <strong class="list-group-item-heading">Fecha y hora de servicio</strong>

                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.start_at.date | amDateFormat:'LLLL'"></span> - <span class="text-muted" ng-bind="ctrl.service.start_at.date | amCalendar"></span>
                            </p>
                        </div>
                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Tipo de servicio</strong>

                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.type.data.name"></span>
                            </p>
                        </div>

                        <div class="list-group-item">
                            <strong class="list-group-item-heading">Tiempo estimado del servicio</strong>

                            <p class="list-group-item-text">
                                <span ng-bind="ctrl.service.type.data.response_time | nexoDuration"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white" ng-if="ctrl.service.items.data.length">
                	  <div class="panel-heading">
                			<h3 class="panel-title">Items del servicio</h3>
                	  </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                        </thead>
                        <tbody ng-repeat="item in ctrl.service.items.data">
                        <tr>
                            <td>
                                <span ng-bind="item.name"></span>
                            </td>
                            <td>
                                <span ng-bind="item.description"></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ruteros asignados</h3>
                    </div>
                    <div class="panel-body" ng-if="!ctrl.service.assignments.data.length">
                        <div class="text-center pt pb">
                            <i class="fa fa-group fa-2x"></i>

                            <p>Ningún rutero preasignado.</p>
                        </div>
                    </div>

                    <table class="table table-striped table-hover" ng-if="ctrl.service.assignments.data.length">
                    	<thead>
                    		<tr>
                    			<th>Nombre</th>
                    			<th>Fecha</th>
                    			<th>Estado</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<tr ng-repeat="assignment in ctrl.service.assignments.data">
                    			<td>
                                    <span ng-bind="assignment.user.data.name"></span>
                                </td>
                                <td>
                                    <span ng-bind="assignment.start_at.date | amCalendar"></span>
                                </td>
                                <td>
                                    <span class="label label-warning" ng-if="assignment.pending">Pendiente</span>
                                    <span class="label label-success" ng-if="assignment.accepted">Aceptada</span>
                                    <span class="label label-danger" ng-if="assignment.declined">Declinada</span>
                                </td>
                    		</tr>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection