<form name="form" novalidate ng-submit="submit()">
    <div class="modal-header">
        <h3 class="modal-title" ng-hide="editMode">Crear campo para {{serviceType.name}}</h3>
        <h3 class="modal-title" ng-show="editMode">Editar campo</h3>
    </div>
    <div class="modal-body">
        <formly-form model="model" fields="fields" form="form"></formly-form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">{{ editMode ? 'Editar' : 'Crear' }}</button>
        <button class="btn btn-default" type="button" ng-click="cancel()">Cancelar</button>
    </div>

</form>