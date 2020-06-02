<style>
    .angular-google-map-container{
        height: 520px;
    }
</style>


<div class="row mb" style="min-height: 550px;">

    <div class="alert alert-info col-md-12" ng-if="vm.showEmptyDataMessage">
        Lo sentimos, no tenemos información acerca de la posición de los ruteros.
    </div>


    <div class="col-md-12" ng-if="vm.showMap">
        <ui-gmap-google-map center="vm.map.center" zoom="vm.map.zoom" draggable="true"
                            options="{scrollwheel: false}"
                            control="vm.map.control">

            <ui-gmap-marker ng-repeat="m in vm.usersMarkers" coords='m' icon='m.icon' ng-click='vm.onMarkerClicked(m)'
                            idkey='m.id' options="{draggable:false,labelClass:'nexo-marker-label'}">

                <ui-gmap-window show="m.showWindow" closeClick="vm.closeClick" templateUrl="vm.windowTemplateUrl"
                                templateParameter="m"></ui-gmap-window>
            </ui-gmap-marker>


            <ui-gmap-marker coords='vm.serviceMarker' idkey='vm.serviceMarker.id' options="{draggable:true}" icon="vm.serviceMarker.icon">

                <ui-gmap-window show="m.showWindow">
                    {{m.address}}
                </ui-gmap-window>
            </ui-gmap-marker>


        </ui-gmap-google-map>
    </div>
</div>
