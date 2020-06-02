<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate>


    <div class="page-title clearfix">
        <div class="pull-left">


            <h3>
                <i class="fa fa-briefcase"></i> Servicio #{{ vm.model.code }}
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                    <li><a ui-sref="services">Servicios</a></li>

                    <li class="active">Reasignar servicio</li>
                </ol>
            </div>
        </div>

        <div class="pull-right" ng-if="!vm.created">
            <a ui-sref="services" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>


    <div id="main-wrapper">
        <div class="row">

            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Fecha y hora actual de programación</h3>
                    </div>
                    <div class="panel-body">
                        <div><strong>Inicia:</strong> {{ vm.currentDate.start | amDateFormat:'LLL' }}</div>
                        <div><strong>FInaliza:</strong> {{ vm.currentDate.end | amDateFormat:'LLL' }}</div>
                    </div>
                </div>
            </div>

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
    </div>


    <div class="nexo-buttons-fixed" ng-if="!vm.editMode" ng-controller="mapCalendarButtonsController as buttonsVm">
        <div class="btn btn-primary" ng-click="buttonsVm.openMap()">¿Dónde están los ruteros?</div>
        <div class="btn btn-primary" ng-click="buttonsVm.openCalendar()">¿Qué hacen los ruteros?</div>
    </div>

</form>