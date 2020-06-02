<div ng-repeat="element in model[options.key] track by $index">
    <label class="control-label">{{ element.name }}</label>
    <formly-form fields="to.fields" model="element" form="form"></formly-form>
</div>