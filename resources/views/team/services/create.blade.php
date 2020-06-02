@extends('layouts.team')

@section('title')
    Servicios
@endsection

@section('content')
    <div ng-controller="serviceCreateController" ng-cloak>


        <div id="main-wrapper">
            <!-- Formulario -->
            <div ng-show="currentStep == 'creation'">
                <div ng-if="!showCustomerInfo">

                    <!-- Búsqueda de cliente -->
                    <div ng-if="!showCustomerForm">
                        <legend>Seleccionar el cliente</legend>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Busque y seleccione a un cliente existente</h4>
                                    </div>
                                    <div class="panel-body">
                                        <form ng-submit="searchCustomers(searchCustomersKeywords)" novalidate>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-control" type="text"
                                                           name="search_customers_keywords"
                                                           placeholder="Escriba el documento, nombre o email del cliente para iniciar la búsqueda..."
                                                           ng-model="searchCustomersKeywords"/>

                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit"
                                                                ng-disabled="searchingCustomers">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="form-group" ng-if="searchingCustomers">
                                            <i class="fa fa-spin fa-spinner"></i> Buscando clientes...
                                        </div>

                                        <div class="form-group" ng-if="!customers.length && searchedCustomers">
                                            <p>No hay resultados para su búsqueda, use el botón "Crear cliente" para
                                                ingresar este cliente
                                                al
                                                sistema.</p>
                                        </div>
                                    </div>

                                    <table class="table table-condensed table-hover"
                                           ng-if="customers.length && searchedCustomers">
                                        <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Documento</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="customer in customers">
                                            <td>@{{ customer.first_name  }}</td>
                                            <td>@{{ customer.last_name  }}</td>
                                            <td>@{{ customer.document  }}</td>
                                            <td class="text-right">
                                                <div class="btn btn-primary" ng-click="selectCustomer(customer)">
                                                    Seleccionar
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">O ingrese a un nuevo cliente</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="btn btn-primary btn-block" ng-click="showCustomerFormToggle()">
                                                <i class="fa fa-user mr-s"></i>
                                                <span>Crear cliente</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Formulario de creación de cliente -->
                    <div ng-if="showCustomerForm" ng-controller="customerController" ng-form="customerForm">
                        <legend class="cf">
                            <div class="fl-l">Crear cliente</div>
                            <div class="fl-r">
                                <div class="btn-group pb-s">
                                    <div ng-click="submitCustomerForm()" class="btn btn-primary mr">
                                        <i class="fa fa-check"></i> Guardar y continuar
                                    </div>
                                    <div class="btn btn-default" ng-click="showCustomerFormToggle()">Cancelar</div>
                                </div>
                            </div>
                        </legend>
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-white">
                                        <div class="panel-heading clearfix">
                                            <h4 class="panel-title">Información del cliente</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group" show-errors>
                                                <label class="control-label">Nombres</label>
                                                <input class="form-control" type="text" name="first_name"
                                                       ng-model="customerFormData.first_name"
                                                       ng-required="true"/>
                                            </div>
                                            <div class="form-group" show-errors>
                                                <label class="control-label">Apellidos</label>
                                                <input class="form-control" type="text" name="last_name"
                                                       ng-model="customerFormData.last_name"
                                                       ng-required="true"/>
                                            </div>

                                            <div class="form-group" show-errors>
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="email" name="email"
                                                       ng-model="customerFormData.email"
                                                       ng-required="true"/>
                                            </div>

                                            <div class="form-group" show-errors>
                                                <label class="control-label">Tipo de documento</label>

                                                <select class="form-control" name="document_type"
                                                        ng-options="item.slug as item.name for item in CREATION_DATA.documentTypes track by item.slug"
                                                        ng-model="customerFormData.document_type"
                                                        ng-required="true"></select>
                                            </div>

                                            <div class="form-group" show-errors>
                                                <label class="control-label" for="">Documento</label>
                                                <input class="form-control" type="text" name="document"
                                                       ng-model="customerFormData.document"
                                                       ng-required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Direcciones</h3>
                                        </div>
                                        <div class="list-group">
                                            <div class="list-group-item" ng-repeat="address in addresses">
                                                <div class="cf mb">
                                                    <div class="fl-l">
                                                        <small class="text-muted">Dirección #@{{ $index + 1 }}</small>
                                                    </div>

                                                    <div class="fl-r">
                                                        <div class="btn btn-sm btn-danger"
                                                             ng-click="removeAddress(address)"
                                                             ng-if="addresses.length > 1">
                                                            <i class="fa fa-remove"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="">Ciudad</label>

                                                    <ui-select name="city_@{{$index}}" ng-model="address.city">
                                                        <ui-select-match placeholder="Buscar la ciudad...">
                                                            <span ng-bind-html="$select.selected.name"></span>,
                                                            <span class="text-muted"
                                                                  ng-bind-html="$select.selected.state.data.name"></span>
                                                        </ui-select-match>
                                                        <ui-select-choices repeat="city in cities track by $index"
                                                                           refresh="searchCities($select.search)"
                                                                           refresh-delay="0">
                                                            <span ng-bind-html="city.name"></span>,
                                                            <span class="text-muted"
                                                                  ng-bind-html="city.state.data.name"></span>
                                                        </ui-select-choices>
                                                    </ui-select>
                                                </div>

                                                <div class="form-group" show-errors>
                                                    <label class="control-label" for="">Dirección</label>
                                                    <textarea class="form-control" name="street_@{{$index}}" ng-model="address.street" ng-required="true" rows="1"></textarea>
                                                </div>

                                            </div>

                                            <div class="list-group-item text-center">
                                                <div class="">
                                                    <div class="btn btn-default" ng-click="addAddress()"><i class="fa fa-plus"></i>
                                                        Añadir dirección
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Telefonos</h3>
                                        </div>
                                        <div class="list-group">
                                            <div class="list-group-item" ng-repeat="phone in phones">
                                                <div class="cf mb">
                                                    <div class="fl-l">
                                                        <small class="text-muted">Teléfono #@{{ $index + 1 }}</small>
                                                    </div>

                                                    <div class="fl-r">
                                                        <div class="btn btn-sm btn-danger" ng-click="removePhone(phone)"
                                                             ng-if="phones.length > 1">
                                                            <i class="fa fa-remove"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" show-errors>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <div class="btn-group" dropdown is-open="status.isopen">
                                                                <button id="single-button" type="button"
                                                                        class="btn btn-primary"
                                                                        dropdown-toggle ng-disabled="disabled">
                                                                    <i class="@{{ phone.type.icon }} fa-lg"></i> <span
                                                                            class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu"
                                                                    aria-labelledby="single-button">
                                                                    <li role="menuitem"
                                                                        ng-repeat="type in phoneTypes track by $index">
                                                                        <a href="#"
                                                                           ng-click="phone.type = type">@{{ type.name }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <input class="form-control" type="text" name="phone_@{{$index}}"
                                                               ng-model="phone.phone"
                                                               ng-required="true"/>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="list-group-item text-center">
                                                <div class="">
                                                    <div class="btn btn-default" ng-click="addPhone()"><i
                                                                class="fa fa-plus"></i>
                                                        Añadir teléfono
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div ng-if="showCustomerInfo">
                    <legend class="cf">
                        <div class="fl-l">Información del cliente</div>

                        <div class="fl-r">
                            <div class="btn-group pb-s">
                                <div class="btn btn-default" ng-click="selectAnotherCustomer()">Seleccionar otro
                                    cliente
                                </div>
                            </div>
                        </div>
                    </legend>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Información básica</h4>
                                </div>
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">Nombres</h4>

                                        <p class="list-group-item-text" ng-bind="currentCustomer.first_name"></p>
                                    </div>
                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">Apellidos</h4>

                                        <p class="list-group-item-text" ng-bind="currentCustomer.last_name"></p>
                                    </div>
                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">Email</h4>

                                        <p class="list-group-item-text" ng-bind="currentCustomer.email"></p>
                                    </div>
                                    <div class="list-group-item">
                                        <h4 class="list-group-item-heading">Documento</h4>

                                        <p class="list-group-item-text" ng-bind="currentCustomer.document"></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Direcciones</h4>
                                </div>
                                <table class="table table-condensed table-hover">
                                    <tbody>
                                    <tr ng-repeat="address in currentCustomer.addresses.data">
                                        <td>
                                            <div ng-bind="address.street"></div>
                                            <div>
                                                <span ng-bind-html="address.city.data.name"></span>,
                                                <span class="text-muted"
                                                      ng-bind-html="address.city.data.state.data.name"></span>
                                            </div>

                                        </td>
                                        <td class="text-right">
                                            <label class="btn btn-primary"
                                                   ng-class="{'btn-success' : serviceFormData.address.id == address.id}"
                                                   ng-model="serviceFormData.address" btn-radio="address">
                                                <span ng-hide="serviceFormData.address.id == address.id">Seleccionar</span>
                                                <span ng-show="serviceFormData.address.id == address.id">
                                                    <i class="fa fa-check"></i> Seleccionada
                                                </span>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Teléfonos</h4>
                                </div>
                                <table class="table table-condensed table-hover">
                                    <tbody>
                                    <tr ng-repeat="phone in currentCustomer.phones.data">
                                        <td>
                                            <div ng-bind="phone.phone"></div>
                                            <div>
                                                <span class="tex-muted" ng-bind-html="phone.type.name"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <form name="serviceForm" ng-submit="submitService()" novalidate ng-hide="showCustomerForm">

                    <legend>Información del servicio</legend>

                    <!-- Inicial el formulario final -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title"
                                        ng-class="{'text-danger' : serviceForm.type.$invalid && serviceForm.$submitted}">
                                        Seleccione los items del servicio
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group" show-errors>

                                        <input class="form-control hide" type="text" name="type"
                                               ng-model="serviceFormData.service_type"
                                               ng-required="true"/>

                                        <ui-select ng-model="serviceFormData.service_type" ng-required="true">
                                            <ui-select-match placeholder="Seleccione el tipo de servicio...">
                                                @{{$select.selected.name}}
                                            </ui-select-match>
                                            <ui-select-choices
                                                    repeat="item in CREATION_DATA.servicesTypes | filter: $select.search track by item.id">
                                                <div ng-bind-html="item.name | highlight: $select.search"></div>
                                            </ui-select-choices>
                                        </ui-select>
                                    </div>

                                    <div class="mt mb" ng-if="serviceFormData.service_type">
                                        Duración estimada:
                                        <strong>@{{ serviceFormData.service_type.avg_response_time | nexoDuration  }}</strong>
                                    </div>
                                </div>

                                <table class="table table-striped table-hover"
                                       ng-if="serviceFormData.service_type.items.length">
                                    <thead>
                                    <tr>
                                        <th style="width:30px;">Seleccionar</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="item in serviceFormData.service_type.items"
                                        ng-init="item.selected = true">
                                        <td>
                                            <label class="btn btn-default btn-xs" ng-model="item.selected"
                                                   ng-class="{'btn-success' : item.selected}" btn-checkbox>
                                                <i class="fa fa-check"></i>
                                            </label>
                                        </td>
                                        <td ng-bind="item.name"></td>
                                        <td ng-bind="item.description"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Información básica</h4>
                                </div>
                                <div class="panel-body">

                                    <div>
                                        <p>Seleccione la programación del servicio</p>

                                        <div class="ta-c">
                                            <div class="btn btn-default btn-block"
                                                 ng-click="selectServiceType('inmediate')"
                                                 ng-class="{'btn-success': serviceFormData.type == 'inmediate'}"
                                                 ng-disabled="!serviceFormData.service_type.id">
                                                <i class="fa fa-bolt mr-s"></i>
                                                <span>Servicio inmediato</span>
                                            </div>

                                            <div class="btn btn-default btn-block"
                                                 ng-click="selectServiceType('schedule')"
                                                 ng-class="{'btn-success': serviceFormData.type == 'schedule'}"
                                                 ng-disabled="!serviceFormData.service_type.id">
                                                <i class="fa fa-calendar mr-s"></i>
                                                <span>Servicio programado</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt" ng-if="serviceFormData.type == 'schedule'">
                                        <hr>

                                        <div class="ta-c">
                                            <p>Programado para: @{{ serviceFormData.date | amCalendar }}</p>

                                            <div class="btn btn-default btn-sm" ng-click="openSelectDateModal()">Cambiar</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observaciones</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">

                                        <textarea class="form-control" name="observations"
                                                  ng-model="serviceFormData.observations"
                                                  rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <legend>Disponibilidad</legend>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="alert alert-info alert-block">
                                En el siguiente calendario puede realizar el pre-asignado del actual servicio
                                seleccionando el inicio
                                deseado del mismo.
                            </div>


                            <div class="mb" ng-controller="timelineController">
                                <div id="timeline"></div>
                            </div>


                            <div nexo-map nexo-map-service="serviceFormData"></div>
                        </div>
                    </div>

                    <hr>

                    <!-- Validación del cliente -->
                    <input class="hide" type="text" name="customer" ng-model="currentCustomer.id" ng-required="true"/>

                    <!-- Validación de la dirección -->
                    <input class="hide" type="text" name="address" ng-model="serviceFormData.address.id"
                           ng-required="true"/>

                    <!-- Validación de los items
                    <input class="hide" type="number" name="items" ng-model="serviceFormData.items.length" ng-required="true"/>
                    -->

                    <!-- Validación del tipo de servicio -->
                    <input class="hide" type="text" name="date_type" ng-model="serviceFormData.type" ng-required="true"/>

                    <div class="alert alert-danger" ng-if="serviceForm.$invalid && serviceForm.$submitted">
                        <h5>Información incompleta, revise y complete la información necesaria.</h5>

                        <ul>
                            <li ng-if="serviceForm.customer.$invalid && serviceForm.$submitted">
                                Seleccione al cliente para poder crear el servicio.
                            </li>
                            <li ng-if="(serviceForm.address.$invalid && serviceForm.$submitted) && serviceForm.customer.$valid">
                                Seleccione alguna dirección para poder crear el servicio.
                            </li>
                            <!--
                            <li ng-if="serviceForm.items.$invalid && serviceForm.$submitted">
                                Seleccione por lo menos un (1) item de servicio.
                            </li>
                            -->
                            <li ng-if="serviceForm.date_type.$invalid && serviceForm.$submitted">
                                Indique si el servicio es <strong>inmediato</strong> o <strong>programado</strong>.
                            </li>
                        </ul>
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-lg" ng-disabled="disablingSubmitButton">
                            Crear servicio
                        </button>
                    </div>
                </form>
            </div>

            <!-- Resumse -->
            <div ng-if="currentStep == 'confirmation'">
                <h3>Confirmar creación de servicio</h3>

                <hr>

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
                                        <span ng-bind="currentCustomer.first_name"></span>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Apellidos</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="currentCustomer.last_name"></span>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Email</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="currentCustomer.email"></span>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Documento</strong>

                                    <p class="list-group-item-text">
                                        <span class="text-uppercase" ng-bind="currentCustomer.document_type"></span>
                                        - <span ng-bind="currentCustomer.document"></span>
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
                                    <strong class="list-group-item-heading">Ciudad</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="serviceFormData.address.city.data.name"></span>, <span class="text-muted" ng-bind="serviceFormData.address.city.data.state.data.name"></span>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Dirección</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="serviceFormData.address.street"></span>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Mapa</strong>

                                    <p class="list-group-item-text">
                                        <img class="img-responsive" ng-src="@{{ staticMap }}"/>
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
                                    <strong class="list-group-item-heading">Fecha y hora de servicio</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="serviceFormData.date | amDateFormat:'LL'"></span>
                                        a las <span ng-bind="serviceFormData.date | amDateFormat:'hh:mm A'"></span>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Tipo de servicio</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="serviceFormData.service_type.name"></span>
                                    </p>
                                </div>

                                <div class="list-group-item">
                                    <strong class="list-group-item-heading">Tiempo estimado de duración del servicio</strong>

                                    <p class="list-group-item-text">
                                        <span ng-bind="serviceFormData.service_type.avg_response_time | nexoDuration"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-white" ng-if="serviceFormData.items.length">
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
                                <tbody ng-repeat="item in serviceFormData.items">
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


                        <div class="panel panel-white" ng-if="usersPreassigned.length">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ruteros preasignados</h3>
                            </div>
                            <div class="list-group" ng-if="usersPreassigned.length">
                                <div class="list-group-item" ng-repeat="user in usersPreassigned">
                                    <h4 class="list-group-item-heading" ng-bind="user.name"></h4>

                                    <p class="list-group-item-text">
                                        <span ng-bind="user.start_at | amCalendar"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="text-right">
                    <div class="btn-group">
                        <div class="btn btn-primary mr" ng-click="confirmateSubmit()">Confirmar</div>
                        <div class="btn btn-default" ng-click="cancelConfirmation()">Cancelar</div>
                    </div>
                </div>
            </div>


            <!-- Loadder -->
            <div ng-if="currentStep == 'finish'">

                <div ng-if="savingService">
                    <div class="pos-r" style="height:200px;">
                        <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
                    </div>

                    <h3 class="text-center">Estamos creando el servicio, por favor espere...</h3>
                </div>

                <div ng-if="serviceCreated">
                    <div class="text-center pt pb">
                        <i class="fa fa-check-circle fa-4x text-success"></i>

                        <h3>El servicio fue creado correctamente, el código asignado es el siguiente:</h3>

                        <pre ng-bind="newService.code"></pre>

                        <div class="btn-group">
                            <a class="btn btn-default mr"
                               href="{{route('team.services.index', $team->slug)}}">Continuar</a>
                            <a class="btn btn-default" href="{{route('team.services.create', $team->slug)}}">Crear otro
                                servicio</a>
                        </div>
                    </div>
                </div>


                <div ng-if="serviceError">
                    <div class="text-center pt pb">
                        <i class="fa fa-exclamation-triangle fa-4x text-danger"></i>

                        <h3>Ha ocurrido un error mientras se creaba el servicio, por favor inténtelo de nuevo más
                            tarde.</h3>

                        <div class="alert alert-danger mt mb" ng-if="serviceErrorValidation">
                            <div ng-repeat="error in serviceError.errors track by $index" ng-bind="error"></div>
                        </div>

                        <div class="btn btn-default" ng-click="retryConfirmateSubmit()">
                            <span ng-hide="serviceErrorValidation">Reintentar</span>
                            <span ng-show="serviceErrorValidation">Regresar y reintentar</span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <!-- Modals -->
    <script type="text/ng-template" id="select-date-modal.html">
        <form name="selectDateForm" novalidate ng-submit="submit()">
            <div class="modal-header">
                <h3 class="modal-title">Seleccionar la fecha de programación</h3>
            </div>
            <div class="modal-body">
                <div class="form-group" show-errors>
                    <label class="control-label">Fecha programada</label>

                    <div class="input-group">
                        <input name="date" type="text" class="form-control"
                               datepicker-popup="yyyy-MM-dd"
                               ng-model="selectDateData.date"
                               datepicker-options="{formatYear: 'yy',startingDay: 1}"
                               ng-required="true"
                               close-text="Cerrar" current-text="Hoy" clear-text="Limpiar"
                               is-open="datepickerOpened" min-date="minDate"/>

                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="datepickerOpened = !datepickerOpened">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Hora programada</label>
                    <timepicker name="time" ng-model="selectDateData.time" minute-step="1" show-meridian="true"></timepicker>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Seleccionar</button>
                <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
            </div>
        </form>
    </script>

    <script id="event-template" type="text/x-kendo-template">
        <div class="nexo-service-#: status #">
            <small>#: title #</small>
        </div>
    </script>


@endsection
