@extends('layouts.team')

@section('content')
    <form action="{{ route('team.customers.destroy', [$team->slug, $item->id])  }}" id="form-destroy" method="POST">
        <input name='_method' type='hidden' class='hide' value='DELETE'/>
        <input class='hide' type='hidden' name='_token' value='{{ csrf_token()  }}'/>
    </form>


    <form ng-controller="customerFormController as vm" ng-submit="vm.onSubmit()" ng-init="vm.redirectAfterSubmit = '{{ route('team.customers.index', $team->slug)  }}'">

        <div class="page-title cf">
            <div class="fl-l">
                <h3>Cliente: {{ $item->first_name }} {{ $item->last_name }}</h3>

                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fa fa-lg fa-home"></i></a></li>

                        <li><a href="{{ route('team.customers.index', $team->slug) }}">Clientes</a></li>

                        <li class="active">Editar cliente</li>
                    </ol>
                </div>
            </div>

            <div class="fl-r pt-s">
                @if($canDestroy)
                    <div class="btn btn-danger btn-addon" ng-click="vm.onDestroy()" ladda="vm.deleting">
                        <i class="fa fa-remove"></i>
                        Eliminar
                    </div>
                @endif
                <a href="{{ route('team.customers.index', $team->slug)  }}" class="btn btn-default btn-addon">
                    <i class="fa fa-arrow-left"></i>
                    Volver
                </a>
                <button type="submit" class="btn btn-primary btn-addon" ladda="vm.submitting">
                    <i class="fa fa-check"></i>
                    Guardar
                </button>
            </div>
        </div>

        <div id="main-wrapper">

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Información</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.customer" fields="vm.formBasicInformationFields"></formly-form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Direcciones</h3>
                            </div>
                            <div class="panel-body" ng-repeat="address in vm.customer.addresses track by $index">
                                <div class="mb clearfix">
                                    <div class="pull-left">
                                        <small class="text-muted">Dirección #@{{$index+1}}</small>
                                    </div>
                                    <div class="pull-right" ng-show="vm.customer.addresses.length > 1">
                                        <div class="btn btn-xs btn-danger" ng-click="vm.removeStreet($index)">
                                            <i class="fa fa-remove"></i>
                                        </div>
                                    </div>

                                </div>
                                <formly-form model="address" fields="vm.formAddressesFields"></formly-form>
                            </div>
                            <div class="panel-footer ta-c">
                                <div class="btn btn-default" ng-click="vm.addStreet()">
                                    <i class="fa fa-plus"></i> Añadir otra dirección
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Telefonos</h3>
                            </div>
                            <div class="panel-body" ng-repeat="phone in vm.customer.phones track by $index">
                                <div class="mb clearfix">
                                    <div class="pull-left">
                                        <small class="text-muted">Teléfono #@{{$index+1}}</small>
                                    </div>
                                    <div class="pull-right" ng-show="vm.customer.phones.length > 1">
                                        <div class="btn btn-xs btn-danger" ng-click="vm.removePhone($index)">
                                            <i class="fa fa-remove"></i>
                                        </div>
                                    </div>
                                </div>
                                <formly-form model="phone" fields="vm.formPhonesFields"></formly-form>
                            </div>
                            <div class="panel-footer ta-c">
                                <div class="btn btn-default" ng-click="vm.addPhone()">
                                    <i class="fa fa-plus"></i> Añadir otro teléfono
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection