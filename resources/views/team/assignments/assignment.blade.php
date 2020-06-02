@extends('layouts.team')


@section('content')
    <div class="page-title cf">
        <div class="pull-left">
            <h3><i class="fa fa-briefcase"></i> Asignación de servicios</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                    <li class="active">Asignación de servicios</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary  btn-addon" href="{{ route('team.services.create', $team->slug) }}">
                <i class="fa fa-plus"></i>
                Crear servicio
            </a>
        </div>
    </div>

    <div ng-controller="assignmentsController as ctrl">
        <div id="main-wrapper">
            <div class="row">

                <div class="col-md-12" ng-if="!ctrl.loadingServices && !ctrl.services.length">
                    <div class="ta-c pt pb">
                        <i class="fa fa-briefcase fa-4x"></i>

                        <h3>Ningún servicio pendiente por asignar</h3>
                    </div>
                </div>

                <div class="col-md-12" ng-if="!ctrl.loadingServices && ctrl.services.length">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Servicios pendientes por asignación</h3>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Tipo</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="service in ctrl.services" ng-click="ctrl.selectService(service)"
                                        ng-class="{'bg-success': ctrl.currentService.id == service.id}">
                                        <td>
                                            @{{service.code}}
                                        </td>
                                        <td>
                                            @{{service.type.data.name}}
                                        </td>
                                        <td>
                                            <div class="ta-c" tooltip="Hay cambios sin guardar" tooltip-placement="right"
                                                 ng-if="service.hasChanges">
                                                <i class="fa fa-exclamation-triangle fa-lg text-warning"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="panel panel-white" ng-if="ctrl.currentService">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ruteros asignados</h3>
                                </div>

                                <div class="panel-body" ng-if="!ctrl.currentService.assignments.data.length">
                                    <div class="ta-c">
                                        <i class="fa fa-group fa-2x"></i>

                                        <p>Ningún rutero asignado.</p>
                                    </div>
                                </div>

                                <table class="table table-striped" ng-if="ctrl.currentService.assignments.data.length">
                                    <tbody>
                                    <tr ng-repeat="assignment in ctrl.currentService.assignments.data">
                                        <td style="width:60px;">
                                            <img class="img-responsive" ng-src="@{{ assignment.user.data.avatar.small }}"/>
                                        </td>
                                        <td>
                                            <strong>@{{ assignment.user.data.name }}</strong><br>
                                            <small class="text-muted">Asignado para @{{ assignment.start_at.date | amCalendar }}</small>
                                        </td>
                                        <td>
                                            <div class="btn btn-danger btn-xs" ng-click="ctrl.removeAssignment(assignment)"><i
                                                        class="fa fa-remove"></i></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="panel-footer text-right" ng-if="ctrl.currentService.hasChanges">
                                    <div class="btn btn-primary" ng-click="ctrl.saveCurrentServiceChanges()"
                                         ladda="ctrl.currentService.saving" ng-disabled="ctrl.currentService.saving">Guardar
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8" ng-if="!ctrl.currentService">
                            <div class="well">
                                Seleccione un servicio para iniciar la asignación
                            </div>
                        </div>

                        <div class="col-sm-8" ng-if="ctrl.currentService">
                            <div class="mb-s cf">
                                <div class="fl-l">
                                    <i class="fa fa-building"></i> @{{ ctrl.currentService.address }}
                                </div>
                                <div class="fl-r">
                                    <i class="fa fa-calendar"></i> <span>@{{ ctrl.currentService.start_at.date | amCalendar }}</span>
                                </div>
                            </div>

                            <div class="mb">
                                <i class="fa fa-user"></i> @{{ ctrl.currentService.customer.data.name }}
                            </div>

                            <ui-gmap-google-map center="ctrl.map.center" zoom="ctrl.map.zoom" draggable="true"
                                                options="{scrollwheel: false}"
                                                control="ctrl.map.control">

                                <ui-gmap-marker ng-repeat="m in ctrl.markers" coords='m' icon='m.icon' ng-click='ctrl.onMarkerClicked(m)'
                                                idkey='m.id' options="{draggable:false}">
                                    <ui-gmap-window show="m.showWindow" closeClick="ctrl.closeClick" templateUrl="m.templateUrl"
                                                    templateParameter="m"></ui-gmap-window>
                                </ui-gmap-marker>


                            </ui-gmap-google-map>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection