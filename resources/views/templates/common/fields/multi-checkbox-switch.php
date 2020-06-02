<ul class="list-group">

    <li class="list-group-item cf" ng-repeat="(key, option) in to.options">
        <div class="fl-l pt-s">
            {{option[to.labelProp || 'name']}}
        </div>

        <div class="fl-r">
            <input
                bs-switch
                ng-model="multiCheckbox.checked[$index]"
                ng-change="multiCheckbox.change()"
                switch-on-text="Activado"
                switch-off-text="Desactivado"
                switch-size="small"
                type="checkbox">

        </div>
    </li>
</ul>