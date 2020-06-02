<!-- Lista de todos los ruteros -->
<div class="panel panel-white">
    <div class="panel-heading panel-heading-actions">
        <h3 class="panel-title">Lista de todos los ruteros ({{ vm.usersList.length }})</h3>

        <div class="panel-control">
            <ul class="list-inline mb-0">
                <li>
                    <div class="btn-group" uib-dropdown dropdown-append-to-body="true">
                        <button id="single-button" type="button" class="btn btn-default" uib-dropdown-toggle>
                            Opciones <span class="caret"></span>
                        </button>
                        <ul class="uib-dropdown-menu" role="menu" aria-labelledby="single-button">
                            <li role="menuitem"><a href ng-click="vm.onSelectAllFreeUsers()">Seleccionar a todos los disponibles</a></li>
                            <li role="menuitem"><a href ng-click="vm.onSelectAllUsers()">Seleccionar todo</a></li>
                        </ul>
                    </div
                </li>
                <li>
                    <input type="text" class="form-control" ng-model="searchUsers.$" placeholder="Buscar en la lista..." ng-change="vm.onResizeLists()">
                </li>
            </ul>
        </div>
    </div>

    <div id="selector-test" kendo-droptarget
         k-dragenter="vm.remove.dragEvents.onEnter"
         k-dragleave="vm.remove.dragEvents.onLeave"
         k-drop="vm.remove.dragEvents.onDrop"
         ng-class="{ 'nexo-drop-target-on-drop' : vm.remove.targetOn, 'nexo-drop-target-entered': vm.remove.targetEntered }">

        <div class="nexo-drop-target-message" ng-show="vm.remove.targetOn">
            <span>
                Suelte aquí a los ruteros que no desea preasignar
            </span>
        </div>


        <div class="nexo-users-list" vs-repeat vs-horizontal nexo-hover-scroll>
            <div class="nexo-users-list-item"
                 ng-repeat="user in vm.usersList | filter:searchUsers | orderBy:'distance'"
                 kendo-draggable
                 k-hint="vm.draggableHint"
                 k-dragstart="vm.add.dragEvents.onStart"
                 k-dragend="vm.add.dragEvents.onEnd"
                 ng-class="{ 'nexo-users-list-item-busy' : user.busy }"
                 data-user-id="{{ user.id }}"
                 data-type="add"
                 ng-dblclick="vm.onSelectUser(user)">

                <div class="media">
                    <div class="media-left">
                        <img ng-src="{{ user.avatar[150] }}">
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading text-ellipsis cf">
                            {{ user.name }}
                        </h4>

                        <p ng-show="user.showDistance">
                            <span ng-if="!!user.distance">{{ user.distance | nexoDistance }}</span>
                            <span ng-if="!user.distance">-</span>
                        </p>
                    </div>

                    <div class="nexo-users-list-item-busy-icon" ng-show="user.busy">
                        <i class="fa fa-minus-circle text-danger fa-lg" uib-tooltip="{{user.firstName}} tiene otro servicio para esta hora" tooltip-append-to-body="true"></i>
                    </div>

                    <div class="actions">
                        <div class="btn btn-xs btn-default btn-addon" ng-click="vm.openUserCalendar(user)">
                            <i class="fa fa-calendar"></i> Ver calendario
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

<!-- // -->

<!-- Lista de ruteros preasignados -->
<div class="panel panel-white">
    <div class="panel-heading panel-heading-actions">
        <h3 class="panel-title">Lista de ruteros preasignados ({{ usersSelected.length }})</h3>

        <div class="panel-control">
            <ul class="list-inline mb-0">
                <li>
                    <div class="btn-group" uib-dropdown dropdown-append-to-body="true">
                        <button id="single-button" type="button" class="btn btn-default" uib-dropdown-toggle>
                            Opciones <span class="caret"></span>
                        </button>
                        <ul class="uib-dropdown-menu" role="menu" aria-labelledby="single-button">
                            <li role="menuitem"><a href ng-click="vm.onDeselectAllBusyUsers()">Quitar a todos los ocupados</a></li>
                            <li role="menuitem"><a href ng-click="vm.onDeselectAllUsers()">Quitar todo</a></li>
                        </ul>
                    </div
                </li>
                <li>
                    <input type="text" class="form-control" ng-model="searchSelectedUsers.$" placeholder="Buscar en la lista...">
                </li>
            </ul>
        </div>
    </div>
    <div class="nexo-drop-target"
         kendo-droptarget
         k-dragenter="vm.add.dragEvents.onEnter"
         k-dragleave="vm.add.dragEvents.onLeave"
         k-drop="vm.add.dragEvents.onDrop"
         ng-class="{ 'nexo-drop-target-on-drop' : vm.add.targetOn, 'nexo-drop-target-entered': vm.add.targetEntered }">


        <div class="nexo-drop-target-message" ng-show="vm.add.targetOn || !usersSelected.length">
            <span ng-show="vm.add.targetOn">
                Suelte aquí los ruteros que desea preasignar
            </span>
            <span ng-hide="vm.add.targetOn" ng-if="!usersSelected.length">
                Arrastre aquí o de doble clic en los ruteros que desea preasignar
            </span>
        </div>

        <div class="nexo-users-list" vs-repeat vs-horizontal nexo-hover-scroll>

            <div class="nexo-users-list-item"
                 ng-repeat="user in usersSelected | filter:searchSelectedUsers | orderBy:'distance'"
                 ng-class="{ 'nexo-users-list-item-busy' : user.busy }"
                 ng-dblclick="vm.onDeselectUser(user)"
                 kendo-draggable
                 k-hint="vm.draggableHint"
                 k-dragstart="vm.remove.dragEvents.onStart"
                 k-dragend="vm.remove.dragEvents.onEnd"
                 data-user-id="{{ user.id }}"
                 data-type="remove">
                <div class="media">
                    <div class="media-left">
                        <img ng-src="{{ user.avatar[150] }}">
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading">{{ user.name }}</h4>

                        <p ng-show="user.showDistance">{{ user.distance | nexoDistance }}</p>
                    </div>

                    <div class="nexo-users-list-item-busy-icon" ng-show="user.busy">
                        <i class="fa fa-minus-circle text-danger fa-lg" uib-tooltip="{{user.firstName}} tiene otro servicio para esta hora" tooltip-append-to-body="true"></i>
                    </div>

                    <div class="actions">
                        <div class="btn btn-xs btn-default btn-addon" ng-click="vm.openUserCalendar(user)">
                            <i class="fa fa-calendar"></i> Ver calendario
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- // -->
