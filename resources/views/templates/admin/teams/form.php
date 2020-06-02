<form name="vm.form" autocomplete="off" ng-submit="vm.onSubmit()" novalidate autocomplete="off">
    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-group"></i> Empresas
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                    <li><a ui-sref="teams">Empresas</a></li>
                    <li class="active" ng-if="!vm.editMode">Crear empresa</li>
                    <li class="active" ng-if="vm.editMode">Editar empresa</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a ui-sref="teams" class="btn btn-default">Cancelar</a>
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
                        <h3 class="panel-title">Módulos</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.modules" form="vm.form"></formly-form>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Límites por rol</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.rolesLimit" form="vm.form"></formly-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>