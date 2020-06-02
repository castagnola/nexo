<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-group"></i> Categorías de productos
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>

                <li class="active">Listado</li>
            </ol>
        </div>
    </div>


    <div class="pull-right">
        <a ui-sref="productsCategories.import" class="btn btn-default btn-addon">
            <i class="fa fa-arrow-up"></i>
            Importar
        </a>
        <a ui-sref="productsCategories.create" class="btn btn-primary btn-addon">
            <i class="fa fa-plus"></i>
            Crear
        </a>
    </div>
</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

                    <table datatable="" dt-options="vm.dtOptions" dt-columns="vm.dtColumns" dt-instance="vm.dtInstance" class="row-border hover"></table>


                </div>
            </div>
        </div>
    </div>
</div>