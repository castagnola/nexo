@extends('layouts.team')


@section('content')
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-bar-chart"></i> Estadísticas
            </h3>
        </div>

    </div>


    <div id="main-wrapper" ng-controller="teamStatsController as ctrl">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-white">
                    <div class="panel-heading cf">
                        <h3 class="panel-title fl-l">Servicios por estado</h3>

                        <div class="fl-r">
                            <form class="form-inline" style="max-width: 500px;">
                                <div class="form-group">
                                    <label for="" class="control-label">Desde</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" datepicker-popup="MMM, yyyy" ng-model="ctrl.dates.services.start" is-open="ctrl.charData.services.openFromPicker"
                                               datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                                style="width: 100px;"  ng-required="true" min-date="'{{$team->created_at}}'" max-date="ctrl.dates.services.end"/>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" ng-click="ctrl.charData.services.openFromPicker = true">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Hasta</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" datepicker-popup="MMM, yyyy" ng-model="ctrl.dates.services.end" is-open="ctrl.charData.services.openToPicker"
                                               datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                               style="width: 100px;" min-date="ctrl.dates.services.start" />

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" ng-click="ctrl.charData.services.openToPicker = true">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-default" download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'services-table', 'Sheet Name Here');">Exportar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="line" class="chart chart-line" chart-data="ctrl.chartData.services.data"
                                chart-labels="ctrl.chartData.services.labels" chart-legend="true" chart-series="ctrl.chartData.services.series"
                                chart-click="onClick" ng-if="!ctrl.loadingChart.services">
                        </canvas>

                        <div  class="pos-r" style="height:200px;" ng-if="ctrl.loadingChart.services">
                            <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="services-table" class="table table-striped table-hover">
                            <colgroup>
                                <col>
                                <col ng-repeat="label in ctrl.chartData.services.labels track by $index" style="min-width: 120px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th></th>
                                <th class="ta-c" ng-repeat="label in ctrl.chartData.services.labels track by $index">@{{label}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="dataParent in ctrl.chartData.services.data track by $index">
                                <th>@{{ ctrl.chartData.services.series[$index]  }}</th>
                                <td ng-repeat="data in dataParent track by $index" class="ta-c">@{{ data }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="panel panel-white">
                    <div class="panel-heading cf">
                        <h3 class="panel-title fl-l">Servicios por rutero</h3>

                        <div class="fl-r" style="padding-right: 150px;">
                            <form class="form-inline" style="max-width: 400px;">
                                <div class="form-group">
                                    <label for="" class="control-label">Desde</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" datepicker-popup="MMM, yyyy" ng-model="ctrl.dates.users.start" is-open="ctrl.charData.users.openFromPicker"
                                               datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                               style="width: 100px;"  ng-required="true" min-date="'{{$team->created_at}}'" max-date="ctrl.dates.users.end"/>

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" ng-click="ctrl.charData.users.openFromPicker = true">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Hasta</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" datepicker-popup="MMM, yyyy" ng-model="ctrl.dates.users.end" is-open="ctrl.charData.users.openToPicker"
                                               datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                               style="width: 100px;" min-date="ctrl.dates.users.start" />

                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" ng-click="ctrl.charData.users.openToPicker = true">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="line" class="chart chart-line" chart-data="ctrl.chartData.users.data"
                                chart-labels="ctrl.chartData.users.labels" chart-legend="true" chart-series="ctrl.chartData.users.series"
                                chart-click="onClick" ng-if="!ctrl.loadingChart.users">
                        </canvas>

                        <div  class="pos-r" style="height:200px;" ng-if="ctrl.loadingChart.users">
                            <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection