<form name="vm.form" ng-submit="vm.onSubmit()" novalidate>

    <div class="page-title clearfix">
        <div class="pull-left">
            <h3>
                <i class="fa fa-cog"></i> Configuración
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                    <li class="active">Preferencias de la empresa</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-primary" ladda="vm.submitting">Guardar</button>
        </div>

    </div>


    <div id="main-wrapper">


        <div class="panel panel-white">
            <div class="panel-body">
                <formly-form model="vm.model" fields="vm.fields" form="vm.form"></formly-form>
            </div>
        </div>

    </div>

</form>