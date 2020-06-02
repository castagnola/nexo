<form name="vm.form" ng-submit="vm.onSubmit()" novalidate>

    <div class="page-title clearfix">
        <div class="pull-left">
            <h3 ng-if="!vm.editMode">
                <i class="fa fa-cog"></i> Crear encuesta
            </h3>

            <h3 ng-if="vm.editMode">
                <i class="fa fa-cog"></i> {{serviceType.name}}
            </h3>

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                    <li><a ui-sref="config.servicesTypes">Encuestas</a></li>

                    <li class="active" ng-if="!vm.editMode">Crear encuesta</li>
                    <li class="active" ng-if="vm.editMode">Editar encuesta</li>
                </ol>
            </div>
        </div>

        <div class="pull-right">
            <a href class="btn btn-default" ui-sref="config.polls">
                Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <formly-form model="vm.model" fields="vm.fields" form="vm.form"></formly-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>