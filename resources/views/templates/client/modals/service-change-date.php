<form name="form" novalidate ng-submit="submit()">
    <div class="modal-header">
        <h3 class="modal-title">Servicio #{{service.code}}</h3>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="" class="control-label">Fecha de programación actual:</label>

            <p class="form-control-static">
                <strong>{{service.start_at.date | amDateFormat:'LLLL'}}</strong>
            </p>
        </div>

        <div class="form-group" show-errors>
            <label for="" class="control-label">Nueva fecha de programación:</label>

            <div class="input-group">
                <input name="date" type="text" class="form-control"
                       datepicker-popup="yyyy-MM-dd"
                       ng-model="formData.date"
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
            <label for="" class="control-label">Nueva hora de programación:</label>

            <timepicker name="time" ng-model="formData.time" minute-step="minutesStep" show-meridian="true" ng-required="true"></timepicker>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" ladda="submitting">Reprogramar</button>
        <button class="btn btn-default" type="button" ng-click="cancel()" ng-disabled="submitting">Cancelar</button>
    </div>
</form>