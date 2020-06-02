<div>
    <!--loop through each element in model array-->
    <div class="{{hideRepeat}}">
        <div class="repeatsection" ng-repeat="element in model[options.key] track by $index" ng-init="fields = copyFields(to.fields)">

            <p class="text-muted">{{ to.label }} #{{$index+1}}</p>

            <formly-form fields="fields" model="element" form="form"></formly-form>
            <div style="margin-bottom:20px;">
                <button type="button" class="btn btn-sm btn-danger" ng-click="model[options.key].splice($index, 1)" ng-show="model[options.key].length > 1">
                    Eliminar
                </button>
            </div>
            <hr>
        </div>
        <p class="AddNewButton">
            <button type="button" class="btn btn-primary" ng-click="addNew()">{{to.btnText}}</button>
        </p>
    </div>
</div>

