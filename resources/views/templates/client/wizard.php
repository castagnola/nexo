<div>

    <ul class="steps-indicator steps-{{getEnabledSteps().length}}" ng-if="!hideIndicators">
        <li ng-class="{default: !step.completed && !step.selected, current: step.selected && !step.completed, done: step.completed && !step.selected, editing: step.selected && step.completed}"
            ng-repeat="step in getEnabledSteps()">
            <a ng-click="goTo(step)">{{step.title || step.wzTitle}}</a>
        </li>
    </ul>

    <div class="clearfix"></div>

    <div class="mt-xl steps" ng-transclude></div>
</div>