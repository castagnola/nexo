@extends('layouts.team')

@section('content')

    <style>
        .myGrid {
            width: 100%;
        }
    </style>

    <div ng-controller="customersController as vm" ng-cloak>
        <div class="page-title clearfix">
            <div class="pull-left">
                <h3>
                    <i class="fa fa-group"></i> Clientes
                </h3>

                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>

                        <li class="active">Listado de clientes</li>
                    </ol>
                </div>
            </div>

            <div class="pull-right">

            </div>
        </div>


        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Listado de clientes</h4>
                        </div>


                        <div class="panel-body">
                            <button ng-click="vm.toggleFiltering()" class="btn btn-primary mb-xs" ng-if="vm.grid.data.length && !vm.loading" ng-cloak>
                                @{{ vm.grid.enableFiltering ? 'Ocultar' : 'Mostrar'  }} filtros
                            </button>

                            <div ui-grid="vm.grid" class="myGrid" ui-grid-resize-columns ui-grid-move-columns ng-if="vm.grid.data.length && !vm.loading"></div>

                            <div class="text-center pt pb" ng-if="!vm.grid.data.length && !vm.loading">
                                <i class="fa fa-group fa-2x"></i>

                                <h3>Ningún cliente creado.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection