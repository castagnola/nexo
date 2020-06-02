<a href class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
    <i class="fa fa-bell"></i>
    <span class="badge badge-success pull-right" ng-if="notifications.length > 0" ng-cloak>
        @{{notifications.length}}
    </span>
</a>
<ul class="dropdown-menu title-caret dropdown-lg" role="menu" ng-if="notifications.length" ng-cloak>
    <li class="dropdown-menu-list slimscroll messages">
        <ul class="list-unstyled">
            <li ng-repeat="notification in notifications">
                <a href ng-click="openNotification(notification)">
                    <div class="msg-img">
                        <div class="online on"></div>
                        <img class="img-circle" ng-src="@{{ notification.creator.data.avatar['150'] }}" alt=""></div>
                    <p class="msg-name" ng-bind="notification.creator.data.name"></p>

                    <p class="msg-text" ng-bind-html="notification.message"></p>

                    <p class="msg-time" am-time-ago="notification.created_at.date"></p>
                </a>
            </li>
        </ul>
    </li>
    <!-- <li class="drop-all"><a href="#" class="text-center">All Messages</a></li> -->
</ul>


<ul class="dropdown-menu title-caret dropdown-lg" role="menu" ng-if="!notifications.length" ng-cloak>
    <li class="ta-c dropdown-menu-list pt-l pb-l">
        <div><i class="fa fa-2x fa-bell-o"></i></div>
        <div class="mt">No hay notificaciones nuevas</div>
        <div class="text-muted">Te avisaremos apenas hayan novedades</div>
    </li>
    <!-- <li class="drop-all"><a href="#" class="text-center">All Messages</a></li> -->
</ul>