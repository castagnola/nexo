<dashboard users="::$resolve.users" assignments="::$resolve.assignments" team="::$resolve.team" roles-limits="::$resolve.rolesLimits" class="ng-scope ng-isolate-scope">
    <div class="md-padding">
        <md-content layout="row" layout-margin="" layout-wrap="" layout-fill="" class="layout-fill layout-margin layout-wrap layout-row">
            <div flex="" class="flex">
                <div class="md-nx-panel md-whiteframe-1dp" md-whiteframe="1">
                    <md-toolbar>
                        <div class="md-toolbar-tools">
                            <h5 translate="PAGES.DASHBOARD.ULTIMAS_ASIGNACIONES_CREADAS" class="ng-scope">Historial de asignaciones</h5>
                        </div>
                    </md-toolbar>
                    <md-content layout="column" layout-padding="" class="layout-padding layout-column">
                        <p ng-if="!vm.assignments.length" class="ng-scope">No hay asignaciones creadas</p>
                        <md-list role="list">
                            <md-list-item ng-repeat="item in vm.assignments" role="listitem" tabindex="-1" class="ng-scope">
                                <a class="md-no-style md-button md-ink-ripple" aria-label="#117007 hace 2 meses" href="#/asignaciones/[[ item.id ]]">
                                    <div class="md-list-item-inner ng-scope">
                                        <p class="ng-binding">[[ item.code ]]</p>
                                        <span class="md-secondary md-caption ng-binding">[[ item.created_at.date | amTimeAgo  ]]</span>
                                        <p class="md-secondary md-caption ng-binding" ng-if="item.team.logo">
                                            <img ng-src="[[ item.team.logo ]]" alt="[[ item.team.name ]]" width="20%">
                                        </p>
                                    </div>
                                </a>
                            </md-list-item>
                        </md-list>
                    </md-content> 
                </div>
            </div>
        </md-content>
    </div>
</dashboard>