<formly-transclude></formly-transclude>
<div ng-messages="fc.$error" ng-if="form.$submitted || options.formControl.$touched" class="mt-xs">
    <div ng-message="{{ ::name }}" ng-repeat="(name, message) in ::options.validation.messages" class="text-danger">{{ message(fc.$viewValue, fc.$modelValue, this)}}</div>
</div>