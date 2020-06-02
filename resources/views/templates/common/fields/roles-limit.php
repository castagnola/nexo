<ul class="list-group">

    <li class="list-group-item cf" ng-repeat="option in to.options">
        <div class="fl-l pt-s">
            {{ option.name }}
        </div>

        <div class="fl-r">
            <input class="form-control" type="text" id="role-{{ option.id }}" ng-model="option.limit">
        </div>
    </li>
</ul>