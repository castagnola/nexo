<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate>


    <div class="page-title clearfix">
        <div class="pull-left">
            <h3 ng-hide="vm.editMode">
                <i class="fa fa-briefcase"></i> Servicios
            </h3>

            <h3 ng-show="vm.editMode">
                <i class="fa fa-briefcase"></i> Servicio #{{ vm.model.code }}
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                    <li><a ui-sref="services">Servicios</a></li>

                    <li class="active" ng-hide="vm.editMode" ng-if="!vm.saved">Crear servicio</li>
                    <li class="active" ng-show="vm.editMode">Editar servicio</li>
                </ol>
            </div>
        </div>

        <div class="pull-right" ng-if="!vm.saved && !vm.submitting">
            <div ng-click="vm.prev()" class="btn btn-default" ng-show="vm.showCancelButton" ng-if="!vm.showNewCustomerForm">Atrás</div>
            <div ng-click="vm.next()" class="btn btn-primary submit-button" ng-if="!vm.showNewCustomerForm" ng-hide="vm.showSubmitButton">Continuar</div>

            <button type="submit" class="btn btn-primary submit-button" ng-if="vm.showSubmitButton" ladda="submitting">Crear servicio</button>

            <!-- Formulario de creación de cliente -->
            <div ng-click="vm.showNewCustomerForm = false" class="btn btn-default" ng-if="vm.showNewCustomerForm">Cancelar</div>
            <div ng-click="vm.onNextWithNewCustomer()" class="btn btn-primary" ng-if="vm.showNewCustomerForm"
                 ng-disabled="vm.forms.newCustomer.basic.$invalid || vm.forms.newCustomer.addresses.$invalid || vm.forms.newCustomer.phones.$invalid"
                 ladda="vm.creatingCustomer">
                Crear cliente y continuar
            </div>

        </div>
    </div>


    <div id="main-wrapper">

        <div class="col-md-12" style="height:200px;" ng-if="vm.submitting">
            <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
        </div>


        <div class="ta-c" ng-if="vm.saved">
            <h3>El servicio con el código {{vm.newService.code}} ha sido creado correctamente.</h3>

            <div class="btn-group">
                <div class="btn btn-default" ng-click="vm.onCreateAnotherServiceClick()">Crear otro servicio</div>
                <a ui-sref="services" class="btn btn-default">Ver lista de servicios</a>
            </div>
        </div>

        <wizard ng-if="!vm.saved" ng-hide="vm.submitting" on-finish="vm.onSubmit()" template="/ui/template?name=wizard">

            <!-- Paso 1 -->
            <wz-step wz-title="Cliente">

                <div class="row" ng-hide="vm.showNewCustomerForm">
                    <div class="col-md-8">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Busque y seleccione a un cliente existente</h4>
                            </div>
                            <div class="panel-body">
                                <div ng-form="customerSearching" isolate-form>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="text"
                                                   name="search_customers_keywords"
                                                   placeholder="Escriba el documento, nombre o email del cliente para iniciar la búsqueda..."
                                                   ng-model="searchCustomersKeywords"
                                                   ng-model-options="{debounce:400}"
                                                   ng-change="vm.onSearchCustomers(searchCustomersKeywords)"/>

                                            <div class="input-group-btn">
                                                <div class="btn btn-primary" ng-disabled="vm.searchingCustomers" ng-click="vm.onSearchCustomers(searchCustomersKeywords)">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" ng-if="vm.searchingCustomers">
                                    <i class="fa fa-spin fa-spinner"></i> Buscando clientes...
                                </div>

                                <div class="form-group" ng-if="!vm.customers.length && vm.searchedCustomers">
                                    <p>
                                        No hay resultados para su búsqueda, use el botón "Crear cliente" para
                                        ingresar un cliente al sistema.
                                    </p>
                                </div>
                            </div>

                            <table class="table table-condensed table-hover" ng-if="vm.customers.length | limitTo:20">
                                <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Documento</th>
                                    <th>Teléfono</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="customer in vm.customers">
                                    <td>{{ customer.first_name }}</td>
                                    <td>{{ customer.last_name }}</td>
                                    <td>{{ customer.document }}</td>
                                    <td>{{ customer.phones[0].phone }}</td>
                                    <td class="text-right">
                                        <div class="btn" ng-click="vm.onSelectCustomer(customer)"
                                             ng-class="{ 'btn-success' : vm.model.customer_id == customer.id, 'btn-primary': vm.model.customer_id != customer.id }">
                                            <span ng-hide="vm.model.customer_id == customer.id">Seleccionar</span>
                                            <span ng-show="vm.model.customer_id == customer.id">Seleccionado</span>
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
                                    <div class="btn btn-primary btn-block" ng-click="vm.showNewCustomerForm = true">
                                        <i class="fa fa-user mr-s"></i>
                                        <span>Crear cliente</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" ng-if="vm.showNewCustomerForm">
                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Información del cliente</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.customer" fields="vm.fields.newCustomer.basic" form="vm.forms.newCustomer.basic"></formly-form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Direcciones</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.customer" fields="vm.fields.newCustomer.addresses" form="vm.forms.newCustomer.addresses"></formly-form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Teléfonos</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.customer" fields="vm.fields.newCustomer.phones" form="vm.forms.newCustomer.phones"></formly-form>
                            </div>
                        </div>
                    </div>
                </div>

            </wz-step>

            <!-- Paso 2 -->
            <wz-step wz-title="Categoría del servicio">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Información del servicio</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.model" fields="vm.fields.basic" form="vm.forms.basic"></formly-form>
                                <formly-form model="vm.model" fields="vm.fields.extra" form="vm.forms.extra"></formly-form>
                            </div>
                        </div>
                    </div>
                </div>


            </wz-step>

            <!-- Paso 3 -->
            <wz-step wz-title="Dirección">

                <div ng-if="vm.showContactForm">
                    <formly-form model="vm.model" fields="vm.fields.contact" form="vm.forms.contact"></formly-form>
                </div>
            </wz-step>

            <!-- Paso 4 -->
            <wz-step wz-title="Fecha y ruteros" ng-hide="vm.editMode">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Seleccione la programación del servicio</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.model" fields="vm.fields.date" form="vm.forms.date"></formly-form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Seleccione el tipo de asignación del servicio</h3>
                            </div>
                            <div class="panel-body">
                                <formly-form model="vm.model" fields="vm.fields.assignment_type" form="vm.forms.assignment_type"></formly-form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <formly-form model="vm.model" fields="vm.fields.users" form="vm.forms.users"></formly-form>
                    </div>
                </div>

            </wz-step>

            <!-- último paso -->
            <wz-step wz-title="Confirmar">
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
                                            <span class="fl-r">{{ vm.model.customer.name }}</span>
                                        </li>
                                        <li>
                                            <strong>Documento</strong>
                                            <span class="fl-r">{{ vm.model.customer.document_formatted }}</span>
                                        </li>
                                        <li>
                                            <strong>Email</strong>
                                            <span class="fl-r">{{ vm.model.customer.email }}</span>
                                        </li>
                                        <li ng-repeat="phone in vm.model.customer.phones">
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
                                    <div>{{ vm.model.address }}</div>

                                    <div class="mt">
                                        <img class="img-responsive" ng-src="{{vm.model.map}}" alt="Map Static">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="stats-info">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Información del servicio</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>Categoría</strong>
                                            <span class="fl-r">{{ vm.model.service_type.name }}</span>
                                        </li>

                                        <li ng-repeat="item in vm.model.items_data" style="min-height: 43px">
                                            <strong ng-show="$first">Herramientas</strong>
                                            <span class="fl-r">
                                                {{ item.name }}
                                            </span>
                                        </li>


                                        <li ng-if="!!vm.model.observations">
                                            <strong>Observaciones</strong>
                                            <span class="fl-r">{{ vm.model.observations }}</span>
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
                                            <span class="fl-r">{{ vm.model.date_type == 'schedule' ? 'Programado' : 'Inmediato' }}</span>
                                        </li>

                                        <li>
                                            <strong>Tipo de asignación</strong>
                                            <span class="fl-r">{{ vm.model.assignment_type == 'mandatory' ? 'Obligatorio' : 'Por demanda' }}</span>
                                        </li>

                                        <li>
                                            <strong>Inicia</strong>
                                            <span class="fl-r">{{ vm.model.start_at | amDateFormat:'LLLL' }}</span>
                                        </li>

                                        <li>
                                            <strong>Finaliza</strong>
                                            <span class="fl-r">{{ vm.model.end_at | amDateFormat:'LLLL' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Resumen de usuarios solo en modo creación -->
                            <div ng-if="!vm.editMode">
                                <div class="panel panel-white" ng-if="vm.model.assignment_type == 'demand'">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ruteros preasignados</h3>
                                    </div>
                                    <div class="panel-body" ng-if="!vm.model.assignments.length">
                                        <p class="ta-c">No hay ruteros preasignados</p>
                                    </div>
                                    <table class="table table-hover" ng-if="vm.model.assignments.length">
                                        <tbody>
                                        <tr ng-repeat="user in vm.model.assignments">
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

                                <div class="panel panel-white" ng-if="vm.model.assignment_type == 'mandatory'">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ruteros asignados</h3>
                                    </div>
                                    <div class="panel-body" ng-if="!vm.model.users.length">
                                        <p class="ta-c">No hay ruteros asignados</p>
                                    </div>
                                    <table class="table table-hover" ng-if="vm.model.users.length">
                                        <tbody>
                                        <tr ng-repeat="user in vm.model.users">
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
                            </div>
                        </div>
                    </div>
                </div>
            </wz-step>


        </wizard>


    </div>


    <div class="nexo-buttons-fixed" ng-if="!vm.editMode" ng-controller="mapCalendarButtonsController as buttonsVm">
        <div class="btn btn-primary" ng-click="buttonsVm.openMap()">¿Dónde están los ruteros?</div>
        <div class="btn btn-primary" ng-click="buttonsVm.openCalendar()">¿Qué hacen los ruteros?</div>
    </div>

</form>


