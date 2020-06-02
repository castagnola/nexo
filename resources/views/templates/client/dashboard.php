<div>

    <div class="profile-cover" style="background:#828384; height:100px;">
        <div class="row">
            <div class="col-md-3 profile-image" style="margin-top:30px;">
                <div class="profile-image-container">
                    <img ng-src="{{ team.logo }}" alt="Logo de la empresa" style="background-color:#fff;">
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>{{ $pagination.services.total }}</h3>

                    <p>Servicios</p>
                </div>
                <div class=" profile-info-value">
                    <h3>{{ team.users.data.length }}</h3>

                    <p>Usuarios</p>
                </div>
            </div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 user-profile">

                <h3 class="text-center">{{ team.name }}</h3>

                <p class="text-center"><a ng-href="{{ team.url }}" target="_blank">{{ team.url }}</a></p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Creado {{ team.created_at.date | amTimeAgo }}
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fa fa-calendar m-r-xs"></i>
                            Modificado {{ team.updated_at.date | amTimeAgo }}
                        </p>
                    </li>
                </ul>
                <hr>

                <!--
                <a ui-sref="editTeam" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-pencil m-r-xs"></i> Editar
                </a>

                <a href="#" class="btn btn-danger btn-lg btn-block">
                    <i class="fa fa-remove m-r-xs"></i> Eliminar
                </a>

                -->
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Últimos usuarios registrados</h3>
                            </div>
                            <div class="panel-body">

                                <h4 class="m-t-lg text-center" ng-if="!team.users.data.length">
                                    Ningún usuario registrado
                                </h4>

                                <div class="inbox-widget" style="height:auto!important;" ng-if="team.users.data.length">

                                    <div class="inbox-item" ng-repeat="user in team.users.data | limitTo:5 | orderBy:'-id'">
                                        <div class="inbox-item-img">
                                            <img ng-src="{{ user.avatar[150] }}" class="img-circle" alt="">
                                        </div>
                                        <p class="inbox-item-author">
                                            {{ user.name }}
                                        </p>

                                        <p class="inbox-item-text" style="margin-left:56px;">
                                            {{ user.email }}
                                            <br>


                                            <span class="label label-default text-uppercase" ng-repeat="role in user.roles track by $index">
                                                {{ role }}
                                            </span>

                                        </p>

                                        <p class="inbox-item-date" data-toggle="tooltip">
                                            {{ user.created_at.date | amTimeAgo }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer text-center">
                                <a class="btn btn-default btn-block" ui-sref="users">
                                    Ver todos
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-white">

                            <div class="panel-heading">
                                <h3 class="panel-title">Últimos servicios creados</h3>
                            </div>

                            <div class="panel-body">

                                <div class="ta-c" ng-if="!$pagination.services.total">
                                    <h4 class="m-t-lg">
                                        Ningún servicio creado
                                    </h4>
                                    <a class="btn btn-primary btn-block" ui-sref="services.create">
                                        Crear el primero
                                    </a>
                                </div>

                                <div class="inbox-widget" style="height:auto!important;" ng-if="$pagination.services.total">

                                    <div class="inbox-item" ng-repeat="service in services">
                                        <p class="inbox-item-author">
                                            {{service.name}}
                                        </p>

                                        <p class="inbox-item-text">
                                            {{service.customer.name}}
                                        </p>

                                        <p class="inbox-item-date">
                                            {{service.created_at.date | amTimeAgo}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer text-center" ng-if="$pagination.services.total">
                                <a class="btn btn-default btn-block" ui-sref="services">
                                    Ver todos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Módulos</h3>
                    </div>
                    <table class="table table-hover">

                        <tbody>

                        <tr ng-repeat="module in $nexoModules">
                            <td>
                                <span>
                                    {{ module.name }}
                                </span>
                            </td>
                            <td>

                                <span class="label label-success text-uppercase" ng-if="vm.isTeamModule(module)">Activado</span>
                                <span class="label label-danger text-uppercase" ng-if="!vm.isTeamModule(module)">Desactivado</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Límites por rol</h3>
                    </div>

                    <table class="table table-hover" ng-if="team.limits.data.length">
                        <tbody>

                        <tr ng-repeat="limit in team.limits.data">
                            <td>{{limit.role_name}}</td>
                            <td width="200">
                                <div>{{ team.limits_used[limit.role_slug] }} de {{ limit.limit }}</div>
                                <uib-progressbar type="success" value="team.limits_used[limit.role_slug] * 100 / limit.limit"></uib-progressbar>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="panel-body" ng-if="!team.limits.data.length">
                        <h4 class="m-t-lg text-center">No hay límites definidos para esta empresa.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>