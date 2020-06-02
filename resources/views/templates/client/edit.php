<form name="vm.form" novalidate ng-submit="vm.onSubmit()">

    <div class="page-title cf">
        <div class="fl-l">
            <h3><i class="fa fa-briefcase"></i> Editar empresa</h3>
        </div>

        <div class="fl-r">
            <button type="submit" class="btn btn-primary" ng-disabled="vm.form.$invalid" ladda="vm.submitting">Guardar</button>
            <a ui-sref="dashboard" class="btn btn-default">Cancelar</a>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información básica</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.basic" options="vm.options" form="vm.forms.basic"></formly-form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Módulos</h3>
                    </div>
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields.modules" options="vm.options" form="vm.forms.modules"></formly-form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

