<div class="page-title clearfix">
    <div class="pull-left">
        <h3>
            <i class="fa fa-group"></i> Clientes
        </h3>

        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a ui-sref="dashboard"><i class="fa fa-home"></i></a></li>
                <li><a ui-sref="customers">Listado de clientes</a></li>

                <li class="active">Importar clientes</li>
            </ol>
        </div>
    </div>


</div>


<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12" style="height:200px;" ng-if="vm.importing && !vm.ready">
            <span us-spinner="{radius:30, width:8, length: 16}" spinner-start-active="true"></span>
        </div>

        <!-- Importing -->
        <form name="importForm" ng-submit="vm.onSubmit(importForm.$valid)">

            <div class="col-md-12" ng-hide="vm.importing">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <p>Para importar sus clientes a Nexo siga las siguientes instrucciones:</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p>Descargue el archivo guía para realizar la importación de manera correcta. Recomendamos no alterar el nombre o la posición de las columnas.</p>

                            <a href="/imports/customers/guia.xlsx" class="btn btn-default btn-addon" target="_blank">
                                <i class="fa fa-arrow-down"></i>
                                Descargar archivo guia
                            </a>
                        </li>
                        <li class="list-group-item">
                            <p>Para rellenar la columna <strong>"Tipo de documento"</strong> tiene que escribir el código que corresponda al tipo deseado. <br> A continuación listamos los que usamos:</p>

                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-condensed table-hover">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Cédula de ciudadanía</td>
                                            <th>CC</th>
                                        </tr>
                                        <tr>
                                            <td>NIT</td>
                                            <th>NIT</th>
                                        </tr>
                                        <tr>
                                            <td>Cédula de extranjería</td>
                                            <th>CE</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <p>Para rellenar la columna <strong>"Ciudad"</strong> puede escribir el nombre exacto de la ciudad <i>(ej: Bogotá D.C.)</i> o su código. Es recomendable usar el código para
                                evitar incoherencias al momento de importar. <br> A continuación puede descargar el listado de ciudades y municipios con su respectivo código:</p>

                            <a href="/imports/customers/municipios.xls" class="btn btn-default btn-addon">
                                <i class="fa fa-arrow-down"></i>
                                Descargar listado de ciudades con código
                            </a>
                        </li>
                        <li class="list-group-item">

                            <p>Cuando esté listo su archivo, seleccionelo desde su computador y presione iniciar importación.</p>

                            <div class="btn btn-default btn-addon" ngf-select ng-model="vm.model.file" name="file" ngf-pattern="'.xls,.xlsx,.csv'" ngf-accept="'.xls,.xlsx,.csv'"
                                 ngf-multiple="false" ng-required="true">
                                <i class="fa fa-arrow-up"></i>
                                Seleccionar archivo
                            </div>

                            <div class="mt mb" ng-if="importForm.file.$valid && !!vm.model.file">
                                <strong>Archivo seleccionado:</strong> <i class="fa fa-file-excel-o"></i> <span>{{ vm.model.file.name | json }}</span>
                            </div>

                            <div ng-messages="importForm.file.$error" ng-if="importForm.file.$invalid">
                                <div class="alert alert-danger mt" ng-message="pattern">Extensión del archivo inválida. Seleccione un archivo con extensión <strong>xls, xlsx o csv</strong>.</div>
                                <div class="alert alert-danger mt" ng-message="required" ng-if="importForm.$submitted">Por favor seleccione un archivo con extensión <strong>xls, xlsx o csv</strong>.
                                </div>
                            </div>

                        </li>

                        <li class="list-group-item">
                            <button type="submit" class="btn btn-primary">Iniciar importación</button>
                        </li>
                    </ul>
                </div>
            </div>

        </form>


        <!-- Ready -->

        <div class="col-md-12" ng-if="vm.ready">
            <div class="panel panel-white">
                <div class="panel-body cf">
                    <div class="fl-l">
                        <div class="alert alert-success" ng-if="vm.data.total_ready > 0">
                            Hemos encontrado <strong>{{ vm.data.total_ready }} registros</strong> listos para importar.
                        </div>
                        <div class="alert alert-danger" ng-if="vm.data.total_unready > 0 && vm.data.total_ready > 0">
                            Hemos encontrado <strong>{{ vm.data.total_unready }} registros</strong> con errores y no podrán ser importados. Puede presionar "Cancelar" y volver a subir el archivo con las correcciones.
                        </div>

                        <div class="alert alert-danger" ng-if="vm.data.total_unready > 0 && !vm.data.total_ready">
                            No hay ningún registro que se pueda importar, por favor regrese y corrija el archivo.
                        </div>


                        <p>En la siguiente tabla puede revisar la información que se importará.</p>

                    </div>

                    <div class="fl-r">
                        <div class="btn-group" ng-if="vm.data.total_ready > 0">
                            <div class="btn btn-primary" ng-click="vm.onFinish()">
                                Importar {{ vm.data.total_ready }} clientes
                            </div>
                            <div class="btn btn-default" ng-click="vm.onCancel()">
                                Cancelar
                            </div>
                        </div>

                        <div class="btn btn-danger" ng-click="vm.onCancel()" ng-if="!vm.data.total_ready">
                            Regresar y corregir archivo
                        </div>
                    </div>
                </div>

                <table class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Tipo de documento</th>
                        <th>Documento</th>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th>Teléfono fijo</th>
                        <th>Teléfono móvil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in vm.data.items" ng-class="{ 'danger' : !item.ready }">
                        <td>{{ item.first_name }}</td>
                        <td>{{ item.last_name }}</td>
                        <td>
                            <div>{{ item.email }}</div>
                            <strong class="text-danger" ng-show="item.is_email_duplicated">Email duplicado</strong>
                        </td>
                        <td>{{ item.document_type }}</td>
                        <td>
                            <div>{{ item.document }}</div>
                            <strong class="text-danger" ng-show="item.is_document_duplicated">Documento duplicado</strong>
                        </td>
                        <td>
                            <div>{{ item.city_name }}</div>
                            <strong class="text-danger" ng-show="item.city_error">Ciudad no encontrada</strong>
                        </td>
                        <td>{{ item.address }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.mobile }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


