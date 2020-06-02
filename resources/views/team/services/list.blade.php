@extends('layouts.team')

@section('header-styles')
    <style>
        .form-filter .ui-select-container {
            min-width: 200px !important;
            width: auto !important;
        }

        .form-filter .ui-select-container .ui-select-match-item {
            padding: 4px !important;
        }
    </style>
@endsection


@section('content')
    <div class="page-title cf">
        <div class="pull-left">
            <h3><i class="fa fa-briefcase"></i> Servicios</h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>
                    <li class="active">Listado de servicios</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary btn-addon" href="{{ route('team.services.create', $team->slug) }}">
                <i class="fa fa-plus"></i>
                Crear servicio
            </a>
        </div>
    </div>

    <div ng-controller="servicesController as ctrl" ng-cloak>
        <div id="main-wrapper">
            <div class="row" ng-if="(ctrl.services.length && !ctrl.loadingServices) || ctrl.inSearch">
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li>
                            Filtrar por:
                        </li>
                        <li>
                            <div class="btn-group mb" dropdown>
                                <button id="single-button" type="button" class="btn btn-default" dropdown-toggle ng-disabled="disabled">
                                    Estado <span ng-if="ctrl.filterFormData.service_status_id">: @{{ctrl.filterFormData.service_status_id.name}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="single-button">
                                    <li role="menuitem">
                                        <a class="text-muted" href ng-click="ctrl.filterFormData.service_status_id = false" ng-if="ctrl.filterFormData.service_status_id">
                                            <i class="fa fa-remove"></i> Quitar
                                        </a>
                                    </li>
                                    <li class="divider" ng-if="ctrl.filterFormData.service_status_id"></li>
                                    <li role="menuitem" ng-repeat="status in statuses">
                                        <a href ng-click="ctrl.filterFormData.service_status_id = status">@{{status.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="btn-group mb" dropdown>
                                <button id="single-button" type="button" class="btn btn-default" dropdown-toggle ng-disabled="disabled">
                                    Tipo <span ng-if="ctrl.filterFormData.service_type_id">: @{{ctrl.filterFormData.service_type_id.name}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="single-button">
                                    <li role="menuitem">
                                        <a class="text-muted" href ng-click="ctrl.filterFormData.service_type_id = false" ng-if="ctrl.filterFormData.service_type_id">
                                            <i class="fa fa-remove"></i> Quitar
                                        </a>
                                    </li>
                                    <li class="divider" ng-if="ctrl.filterFormData.service_type_id"></li>
                                    <li role="menuitem" ng-repeat="type in types">
                                        <a href ng-click="ctrl.filterFormData.service_type_id = type">@{{type.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="btn-group mb" dropdown>
                                <button id="single-button" type="button" class="btn btn-default" dropdown-toggle ng-disabled="disabled">
                                    Despachador <span ng-if="ctrl.filterFormData.created_by">: @{{ctrl.filterFormData.created_by.name}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="single-button">
                                    <li role="menuitem">
                                        <a class="text-muted" href ng-click="ctrl.filterFormData.created_by = false" ng-if="ctrl.filterFormData.created_by">
                                            <i class="fa fa-remove"></i> Quitar
                                        </a>
                                    </li>
                                    <li class="divider" ng-if="ctrl.filterFormData.created_by"></li>
                                    <li role="menuitem" ng-repeat="user in despachadores">
                                        <a href ng-click="ctrl.filterFormData.created_by = user">@{{user.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="btn-group mb" dropdown>
                                <button id="single-button" type="button" class="btn btn-default" dropdown-toggle ng-disabled="disabled">
                                    Cliente <span ng-if="ctrl.filterFormData.customer_id">: @{{ctrl.filterFormData.customer_id.name}}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="single-button">
                                    <li role="menuitem">
                                        <a class="text-muted" href ng-click="ctrl.filterFormData.customer_id = false" ng-if="ctrl.filterFormData.customer_id">
                                            <i class="fa fa-remove"></i> Quitar
                                        </a>
                                    </li>
                                    <li class="divider" ng-if="ctrl.filterFormData.customer_id"></li>
                                    <li role="menuitem" ng-repeat="customer in customers">
                                        <a href ng-click="ctrl.filterFormData.customer_id = customer">@{{customer.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="col-md-4 col-md-offset-2">
                    <form name="searchForm" novalidate ng-submit="ctrl.searchServices()">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control input-search" placeholder="Buscar..."
                                   ng-model="ctrl.searchFormData.keywords">

                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                <div class="btn btn-default" ng-show="ctrl.inSearch" ng-click="ctrl.clearSearch()">Ver todos</div>
                            </div>
                        </div>
                        <!-- Input Group -->
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="height:200px;" ng-if="ctrl.loadingServices">
                    <ui-spinner></ui-spinner>
                </div>

                <div class="col-md-12">

                    <div class="pos-r" style="height:200px;" ng-if="ctrl.loadingServices">
                        <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
                    </div>


                    <div class="text-center pt-l pb-l" ng-if="!ctrl.services.length && !ctrl.loadingServices && ctrl.inSearch">
                        <i class="fa fa-search fa-4x"></i>

                        <h3>La búsqueda no produjo ningún resultado.</h3>

                        <div class="mt btn btn-primary" ng-click="ctrl.clearSearch()">
                            Ver todos
                        </div>
                    </div>


                    <div class="text-center pt-l pb-l" ng-if="!ctrl.services.length && !ctrl.loadingServices && !ctrl.inSearch">
                        <i class="fa fa-briefcase fa-4x"></i>

                        <h3>No hay ningún servicio creado.</h3>
                    </div>


                    <div class="panel panel-white" ng-if="ctrl.services.length && !ctrl.loadingServices">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="min-width: 1000px">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Cliente</th>
                                    <th>Despachador</th>
                                    <th>Rutero</th>
                                    <th>Actualizado</th>
                                    <th>Programado</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="service in ctrl.services">
                                    <td><span ng-bind="service.code"></span></td>
                                    <td><span ng-bind="service.status.data.name"></span></td>
                                    <td><span ng-bind="service.type.data.name"></span></td>
                                    <td><span ng-bind="service.customer.data.name"></span></td>
                                    <td><span ng-bind="service.creator.data.name"></span></td>
                                    <td>
                                        <span ng-if="service.user" ng-bind="service.user.data.name"></span>

                                        <span class="text-muted" ng-if="!service.user">
                                            Ninguno
                                        </span>
                                    </td>
                                    <td>
                                    <span ng-bind="service.updated_at.date | amTimeAgo" tooltip-placement="top"
                                          tooltip="@{{service.updated_at.date| amDateFormat:'LLL'}}"></span>
                                    </td>
                                    <td>
                                    <span ng-bind="service.start_at.date | amTimeAgo" tooltip-placement="top"
                                          tooltip="@{{service.start_at.date| amDateFormat:'LLL'}}"></span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-default"
                                               ng-href="@{{ service.url.team }}"
                                               tooltip="Ver más" target="_self">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <div class="btn btn-default" tooltip="Cambiar estado" ng-click="ctrl.openChangeStatusModal(service)">
                                                <i class="fa fa-exchange"></i>
                                            </div>

                                            <div class="btn btn-default" tooltip="Reprogramar" ng-click="ctrl.openChangeDateModal(service)">
                                                <i class="fa fa-calendar"></i>
                                            </div>
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
    </div>
@endsection