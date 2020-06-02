<form name="selectDateForm" novalidate ng-submit="submit()">
    <div class="modal-header">
        <h3 class="modal-title">Seleccionar la fecha de programación</h3>
    </div>
    <div class="modal-body">
        <div class="form-group" show-errors>
            <label class="control-label">Fecha programada</label>

            <div class="input-group">
                <input name="date" type="text" class="form-control"
                       datepicker-popup="yyyy-MM-dd"
                       ng-model="selectDateData.date"
                       datepicker-options="{formatYear: 'yy',startingDay: 1}"
                       ng-required="true"
                       close-text="Cerrar" current-text="Hoy" clear-text="Limpiar"
                       is-open="datepickerOpened" min-date="minDate"/>

                <div class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="datepickerOpened = !datepickerOpened">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Hora programada</label>
            <timepicker name="time" ng-model="selectDateData.time" minute-step="1" show-meridian="true"></timepicker>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Seleccionar</button>
        <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
    </div>
</form>