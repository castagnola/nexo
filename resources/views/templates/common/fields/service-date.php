<div class="ta-c">
    <div class="btn btn-default btn-block"
         ng-click="onSelectServiceType('inmediate')"
         ng-class="{'btn-primary': model.date_type == 'inmediate'}">
        <i class="fa fa-bolt mr-s"></i>
        <span>Servicio inmediato</span>
    </div>

    <div class="btn btn-default btn-block"
         ng-click="onSelectServiceType('schedule')"
         ng-class="{'btn-primary': model.date_type == 'schedule'}">
        <i class="fa fa-calendar mr-s"></i>
        <span>Servicio programado</span>
    </div>
</div>

<div class="mt" ng-if="showSelectDateForm">
    <div class="form-group">
        <label class="control-label">Fecha programada</label>

        <input kendo-date-time-picker
               ng-model="str"
               k-ng-model="model.start_at"
               style="width: 100%;"/>
    </div>
</div>