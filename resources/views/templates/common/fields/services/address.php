<div class="row">
    <div class="col-sm-8">
        <div ng-if="showMap">
            <div class="alert alert-info">
                <strong>¡Importante!</strong>
                <p>La ubicación no es exacta, por favor mueva el marcardor (<i class="fa fa-home"></i>) en el mapa si necesita corregirla.</p>
            </div>
            <ui-gmap-google-map center='map.center' zoom='map.zoom' control="map.control">
                <ui-gmap-marker coords="marker.coords" options="marker.options" events="marker.events" idkey="marker.id"></ui-gmap-marker>
            </ui-gmap-google-map>
        </div>
    </div>


    <div class="col-sm-4">
        <div ng-hide="showNewAddressForm" style="max-height:450px; overflow: auto;">
            <div class="panel panel-white"
                 ng-class="{ 'panel-green' : addressSelected.id == address.id }"
                 ng-repeat="address in addresses"
                 style="margin-bottom: 0 !important;">
                <div class="panel-heading">
                    <h3 class="panel-title">Dirección {{$index+1}}</h3>

                    <div class="fl-r">
                        <div class="btn btn-primary btn-sm" ng-click="selectAddress(address)" ng-if="addressSelected.id != address.id">
                            Seleccionar
                        </div>

                        <div class="btn btn-default btn-sm" ng-if="addressSelected.id == address.id">
                            <i class="fa fa-check"></i>
                            Seleccionada
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div>{{ address.street }}</div>
                    <div>
                        {{ address.city.name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-white" ng-if="showNewAddressForm">
            <div class="panel-heading">
                <h3 class="panel-title">Nueva dirección</h3>

                <div class="fl-r">
                    <div class="btn btn-success btn-sm" ng-click="saveNewAddress()" ng-disabled="newAddressForm.$invalid" ladda="savingNewAddress">
                        Guardar
                    </div>

                    <div class="btn btn-default btn-sm" ng-click="cancelSaveNewAddress()">
                        Cancelar
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <formly-form model="newAddressModel" fields="newAddressFields" form="newAddressForm"></formly-form>
            </div>
        </div>

        <div class="ta-c mt">
            <div class="btn btn-primary btn-addon" ng-click="showNewAddressForm = true" ng-hide="showNewAddressForm">
                <i class="fa fa-plus"></i>
                Añadir otra dirección
            </div>
        </div>
    </div>


</div>

<div class="col-md-12" style="height:200px;" ng-if="loadingMap">
    <ui-spinner></ui-spinner>
</div>
