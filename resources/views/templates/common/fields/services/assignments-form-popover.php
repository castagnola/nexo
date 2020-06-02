<div>
    <ul class="list-unstyled">
        <li>
            <i class="fa fa-envelope"></i>
            <span>{{ user.email }}</span>
        </li>
        <li ng-repeat="phone in user.phones.data">
            <strong>
                <i class="{{ phone.type.icon }}"></i>
            </strong>
            <span>{{ phone.value }}</span>
        </li>
    </ul>

    <div class="ta-c mt">
        <div class="btn btn-primary" ng-click="vm.openUserCalendar(user)">Ver calendario</div>
    </div>
</div>