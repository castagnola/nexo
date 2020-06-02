<ui-select data-ng-model="model[options.key]" data-required="{{to.required}}" data-disabled="{{to.disabled}}" theme="selectize">
    <ui-select-match placeholder="{{to.placeholder}}" data-allow-clear="false">{{$select.selected[to.labelProp]}}</ui-select-match>
    <ui-select-choices data-repeat="{{to.ngOptions}}">
        <div ng-bind-html="option[to.labelProp] | highlight: $select.search"></div>
    </ui-select-choices>
</ui-select>