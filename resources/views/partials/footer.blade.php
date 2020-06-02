
<div class="cd-overlay"></div>
<!--

<script src="/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/plugins/switchery/switchery.min.js"></script>
<script src="/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="/assets/plugins/waves/waves.min.js"></script>
<script src="/assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
<script src="/assets/plugins/toastr/toastr.min.js"></script>
<script src="/assets/plugins/metrojs/MetroJs.min.js"></script>



<script src="{{ asset('assets/js/vendor.js')  }}"></script>
<script src="{{ asset('assets/js/plugins.js')  }}"></script>


<script src="{{ asset('assets/js/ui/ui.min.js') }}"></script>
<script src="{{ asset('assets/js/ui/tz.min.js') }}"></script>
<script src="{{ asset('assets/js/ui/co.min.js') }}"></script>
<script>kendo.culture("es-CO")</script>


<script src="{{ asset('assets/js/app.common.js')  }}"></script>

<script src="/assets/js/modern.js"></script>
-->


@if(!empty(session('success')))
    <div nexo-alert nexo-alert-type="'success'" nexo-alert-message="'{{ session('success') }}'"></div>
@endif

@if(!empty(session('error')))
    <div nexo-alert nexo-alert-type="'error'" nexo-alert-message="'{{ session('error') }}'"></div>
@endif



<script type="text/ng-template" id="template/datepicker/popup.html">
    <ul class="dropdown-menu" ng-if="isOpen" style="display: block" ng-style="{top: position.top+'px', left: position.left+'px'}" ng-keydown="keydown($event)" ng-click="$event.stopPropagation()">
        <li ng-transclude></li>
        <li ng-if="showButtonBar" style="padding:10px 9px 2px">
            <span class="btn-group pull-left">
            <button type="button" class="btn btn-sm btn-info" ng-click="select('today')" ng-disabled="isDisabled('today')">Hoy</button>
            </span>
            <button type="button" class="btn btn-sm btn-success pull-right" ng-click="close()">Cerrar</button>
        </li>
    </ul>
</script>


<script type="text/ng-template" id="form/cities.html">
    <ui-select ng-model="model.city_id" data-required="@{{to.required}}">
        <ui-select-match placeholder="Escriba para buscar la ciudad...">
            <span ng-bind-html="$select.selected.name"></span>,
            <span class="text-muted" ng-bind-html="$select.selected.state.data.name"></span>
        </ui-select-match>
        <ui-select-choices repeat="city.id as city in cities track by $index | limitTo:10"
                           refresh="searchCities($select.search)"
                           refresh-delay="0">
            <span ng-bind-html="city.name"></span>,
            <span class="text-muted" ng-bind-html="city.state.data.name"></span>
        </ui-select-choices>
    </ui-select>
</script>

<script src="{!! webpack('js', 'vendor') !!}"></script>
<script src="{!! webpack('js', 'app') !!}"></script>

@yield('footer-scripts')

</body>
</html>