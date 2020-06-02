<div class="ta-c">
    <div class="btn btn-default btn-block"
         ng-click="model[options.key] = 'demand'"
         ng-class="{'btn-primary': model[options.key] == 'demand'}"
         popover-trigger="mouseenter"
         popover-title="Ayuda sobre tipo de servicio"
         popover-append-to-body="true"
         uib-popover="Se les preasignará a todos los ruteros disponibles y deberán aceptar/declinar el servicio">

        <span>Servicio por demanda</span>
    </div>

    <div class="btn btn-default btn-block"
         ng-click="model[options.key] = 'mandatory'"
         ng-class="{'btn-primary': model[options.key] == 'mandatory'}"
         popover-trigger="mouseenter"
         popover-title="Ayuda sobre tipo de servicio"
         popover-append-to-body="true"
         uib-popover="Deberá seleccionar al rutero que va a ejecutar el servicio">
        <span>Servicio obligatorio</span>
    </div>
</div>