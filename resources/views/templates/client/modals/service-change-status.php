<form name="form" novalidate ng-submit="submit()">
    <div class="modal-header">
        <h3 class="modal-title">Servicio #{{service.code}}</h3>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="" class="control-label">Estado actual:</label>

            <p class="form-control-static">{{service.status.data.name}}</p>
        </div>

        <div class="form-group">
            <label for="" class="control-label">Nuevo estado:</label>


            <ui-select ng-model="formData.service_status_id">
                <ui-select-match placeholder="Seleccione el nuevo estado...">{{$select.selected.name}}</ui-select-match>
                <ui-select-choices repeat="status.id as status in statuses | filter: $select.search">
                    <div ng-bind-html="status.name | highlight: $select.search"></div>
                </ui-select-choices>
            </ui-select>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" ladda="submitting">Cambiar</button>
        <button class="btn btn-default" type="button" ng-click="cancel()" ng-disabled="submitting">Cancelar</button>
    </div>
</form>