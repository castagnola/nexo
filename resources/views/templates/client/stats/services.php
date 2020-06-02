<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-bar-chart"></i> Servicios por estado
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Estadísticas</li>
            </ol>
        </div>
    </div>

</div>


<div id="main-wrapper">
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
                                    <input type="text" class="form-control" uib-datepicker-popup="MMM, yyyy" ng-model="vm.dates.start" is-open="vm.chartData.openFromPicker"
                                           datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                           style="width: 100px;" ng-required="true" min-date="vm.minDate" max-date="vm.dates.end"/>

                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default" ng-click="vm.chartData.openFromPicker = true">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Hasta</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" uib-datepicker-popup="MMM, yyyy" ng-model="vm.dates.end" is-open="vm.chartData.openToPicker"
                                           datepicker-options="{formatYear: 'yy',startingDay: 1}" close-text="Close" datepicker-mode="'month'" datepicker-append-to-body="true" min-mode="'month'"
                                           style="width: 100px;" min-date="vm.dates.start"/>

                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default" ng-click="vm.chartData.openToPicker = true">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-default" download="{{ team.slug }}-servicios-por-estado-{{ vm.file }}"
                                   href
                                   onclick="return ExcellentExport.excel(this, 'services-table', 'Servicios por estado');">Exportar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="line" class="chart chart-line" chart-data="vm.chartData.data"
                            chart-labels="vm.chartData.labels" chart-legend="true" chart-series="vm.chartData.series"
                            chart-click="onClick" ng-if="!vm.loadingChart">
                    </canvas>

                    <div class="pos-r" style="height:200px;" ng-if="vm.loadingChart">
                        <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="services-table" class="table table-striped table-hover">
                        <colgroup>
                            <col>
                            <col ng-repeat="label in vm.chartData.labels track by $index" style="min-width: 120px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th></th>
                            <th class="ta-c" ng-repeat="label in vm.chartData.labels track by $index">{{label}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="dataParent in vm.chartData.data track by $index">
                            <th>{{ vm.chartData.series[$index] }}</th>
                            <td ng-repeat="data in dataParent track by $index" class="ta-c">{{ data }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>