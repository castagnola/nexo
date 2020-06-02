<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate autocomplete="off">
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-group"></i> Clientes
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                    <li><a ui-sref="customers">Clientes</a></li>
                    <li class="active">Crear cliente</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a ui-sref="customers" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary submit-button" ladda="vm.submitting">Guardar</button>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">

            <div class="col-sm-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del cliente</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.basic" form="vm.form"></formly-form>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Direcciones</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.addresses" form="vm.form"></formly-form>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Teléfonos</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.phones" form="vm.form"></formly-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>