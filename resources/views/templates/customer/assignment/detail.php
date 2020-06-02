<asignaciones-ver-page item="::$resolve.item" class="ng-scope ng-isolate-scope">
    <md-toolbar class="md-toolbar-grey">
        <div class="md-toolbar-tools">
            <h3>
                <span class="ng-binding">Asignación #[[ vm.item.code ]] - [[ vm.item.status.name ]]</span>
            </h3>
            <span flex="" class="flex"></span>
        </div>
    </md-toolbar>

    <assignment-detail item="vm.item" users="vm.item.users.data" services="vm.item.services.data" products="vm.item.products.data" recurrence-dates="vm.item.recurrence_dates.data" class="ng-isolate-scope">
        <md-content layout="row" layout-margin layout-fill layout-xs="column">
            <div flex-xs="100" flex="50">
                <div class="md-nx-panel mb md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="FORMS.ASSIGN.INFORMACION_CLIENTE"></h5>
                        </div>
                    </md-toolbar>
                    <ul class="nx-detail-list">
                        <li>
                            <strong translate="FORMS.CUSTOMER.NOMBRES"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.customer.name ]]</span>
                        </li>

                        <li>
                            <strong translate="FORMS.CUSTOMER.DOCUMENTO"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.customer.document_formatted ]]</span>
                        </li>

                        <li>
                            <strong translate="FORMS.CUSTOMER.EMAIL"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.customer.email ]]</span>
                        </li>
                        <li ng-repeat="phone in vm.item.customer.phones.data" class="ng-scope">
                            <strong class="ng-binding">[[ phone.type.name ]]</strong>
                            <span class="fl-r ng-binding">[[ phone.phone ]]</span>
                        </li>
                        <li>
                            <strong translate="FORMS.CUSTOMER.DIRECCION"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.address ]]</span>
                        </li>
                    </ul>
                </div>
                <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                    <!-- <img  class="img-fluid" ng-src="[[ vm.item.map ]]" alt="Mapa de la asignación">
                                    
                    <ul class="nx-detail-list">
                        <li>
                            <strong>Dirección</strong>
                            <span class="fl-r ng-binding">[[ vm.item.address ]]</span>
                        </li>
                    </ul> -->
                    <div ng-if="map.isReady">
                        <ul class="nx-detail-list">
                            <li class="font-big">
                                <strong translate="CUSTOMER.ASIGNACION.TIEMPO_ESTIMADO_LLEGADA"></strong>
                                <span class="fl-r ng-binding">[[ vm.distance.duration ]]</span>
                            </li>
                        </ul>
                        <div class="map">
                            <ui-gmap-google-map bounds="map.bounds" center='map.center' zoom='map.zoom' aria-label="Google map" control="map.control">
                                    <ui-gmap-marker ng-repeat="marker in markers" coords="marker.coords" options="marker.options" events="marker.events" idkey="marker.id">
                                        <ui-gmap-window>
                                            <div>[[ marker.window.title ]]</div>
                                        </ui-gmap-window>
                                    </ui-gmap-marker>
                            </ui-gmap-google-map>
                        </div>
                    </div>
                    <div ng-if="questionary.isReady && vm.poll">
                        <a class="md-raised md-primary md-button md-nexo-theme md-ink-ripple" aria-label="#117007 hace 2 meses" href="#/encuestas/[[ vm.poll ]]/[[ vm.item.id ]]" translate="CUSTOMER.POLL.ENCUESTA">
                        </a>
                    </div>
                </div>
            </div>

            <div flex-xs="100" flex="50">
                <div class="md-nx-panel mb ng-scope md-whiteframe-1dp" md-whiteframe="1" ng-if="vm.item.accepted.data.length > 0">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="PAGES.ASIGNACIONES.RUTEROS_ASIGNADOS"></h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <md-list role="list">
                            <md-list-item ng-repeat="user in vm.item.accepted.data" role="listitem" class="md-no-proxy ng-scope">
                                <img ng-src="[[ user.avatar.small ]]" alt="[[ user.name ]]" class="md-avatar">
                                <p class="ng-binding">[[user.name]]</p>
                            </md-list-item>
                        </md-list>
                    </md-content>
                </div>
                <div class="md-nx-panel mb ng-scope md-whiteframe-1dp" md-whiteframe="1" ng-if="!vm.creationMode">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="PAGES.ASIGNACIONES.INFORMACION_GENERAL"></h5>
                        </div>
                    </md-toolbar>
                    <ul class="nx-detail-list">
                        <li>
                            <strong translate="PAGES.ASIGNACIONES.ESTADO"></strong>
                            <div class="fl-r">
                                <span class="label nexo-service-">[[ vm.item.status.name ]]</span>
                            </div>
                        </li>
                        <li>
                            <strong translate="PAGES.ASIGNACIONES.CODIGO_DE_SERVICIO"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.code ]]</span>
                        </li>
                        <li>
                            <strong translate="PAGES.ASIGNACIONES.CODIGO_DE_VERIFICACION"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.verification_code ]]</span>
                        </li>
                    </ul>
                </div>

                <div class="md-nx-panel mb md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="PAGES.ASIGNACIONES.PROGRAMACION_ASIGNACION"></h5>
                        </div>
                    </md-toolbar>
                    <ul class="nx-detail-list">
                        <li>
                            <strong translate="PAGES.ASIGNACIONES.TIPO_PROGRAMACION"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.date_type_name ]]</span>
                        </li>

                        <li>
                            <strong translate="PAGES.ASIGNACIONES.TIPO_ASIGNACION"></strong>
                            <span class="fl-r ng-binding">[[ 'OPTIONS.' + vm.item.assignment_type | uppercase | translate ]]</span>
                        </li>

                        <li>
                            <strong translate="CUSTOMER.ASIGNACION.INICIO_ESTIMADO"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.start_at.date || vm.item.start_at | amDateFormat:'LLLL' ]]</span>
                        </li>

                        <li>
                            <strong translate="CUSTOMER.ASIGNACION.FINALIZADO_ESTIMADO"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.end_at.date || vm.item.end_at | amDateFormat:'LLLL' ]]</span>
                        </li>

                        <li>
                            <strong translate="CUSTOMER.ASIGNACION.TIEMPO_ESTIMADO_EJECUCION"></strong>
                            <span class="fl-r ng-binding">[[ vm.item.duration ]] minutos</span>
                        </li>
                    </ul>
                </div>

                <div class="md-nx-panel mb ng-scope md-whiteframe-1dp" md-whiteframe="1" ng-if="vm.item.services.data.length > 0 && vm.item.with_services">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="CUSTOMER.ASIGNACION.SERVICIO_REALIZAR"></h5>
                        </div>
                    </md-toolbar>
                    <ul class="nx-detail-list">
                        <li ng-repeat="service in vm.item.services.data" class="ng-scope">
                            <span class="ng-binding">[[ service.name ]]</span>
                        </li>
                    </ul>
                </div>

                <!-- Productos -->
                <div class="md-nx-panel mb ng-scope md-whiteframe-1dp" md-whiteframe="1" ng-if="vm.item.products.data.length > 0 && vm.item.with_products">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="CUSTOMER.ASIGNACION.PRODUCTO_REALIZAR"></h5>
                        </div>
                    </md-toolbar>
                    <ul class="nx-detail-list">
                        <li ng-repeat="product in vm.item.products.data" class="ng-scope">
                            <span class="ng-binding">[[ product.product.name ]]</span>
                            <span class="fl-r ng-binding">[[ product.quantity ]] unds</span>
                        </li>
                    </ul>
                </div>
            </div>
        </md-content>
    </assignment-detail>
</asignaciones-ver-page>
