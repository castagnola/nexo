<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">

            <li ui-sref-active="active">
                <a ui-sref="dashboard">
                    <span class="menu-icon glyphicon glyphicon-home"></span>

                    <p>Dashboard</p>
                </a>
            </li>

            <li class="droplink" ui-sref-active="active" ng-show="$hasAnyRole(['admin', 'team-admin', 'despachador'])">
                <a href class="waves-effect waves-button">
                    <span class="menu-icon fa fa-briefcase"></span>

                    <p>Servicios</p>

                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li>
                        <a ui-sref="services">Ver todos</a>
                        <a ui-sref="services.create">Crear servicio</a>
                    </li>
                </ul>
            </li>


            <li class="droplink" ui-sref-active="active" ng-show="$hasAnyRole(['admin', 'team-admin', 'despachador'])">
                <a href class="waves-effect waves-button">
                    <span class="menu-icon fa fa-briefcase"></span>

                    <p>Productos</p>

                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li>
                        <a ui-sref="products">Listado de productos</a>
                        <a ui-sref="products.create">Crear producto</a>
                        <a ui-sref="productsCategories">Listado de categorías</a>
                        <a ui-sref="productsCategories.create">Crear categoría</a>
                    </li>
                </ul>
            </li>


            <li ui-sref-active="active" ng-show="$hasAnyRole(['admin', 'team-admin'])">
                <a ui-sref="users">
                    <span class="menu-icon fa fa-user"></span>

                    <p>Usuarios</p>
                </a>
            </li>

            <li ui-sref-active="active" ng-show="$hasAnyRole(['admin', 'team-admin', 'despachador'])">
                <a ui-sref="customers">
                    <span class="menu-icon fa fa-group"></span>

                    <p>Clientes</p>
                </a>
            </li>


            <li class="droplink" ui-sref-active="active" ng-show="$hasAnyRole(['admin','team-admin']) && $hasModule('estadisticas')">
                <a href class="waves-effect waves-button">
                    <span class="menu-icon fa fa-bar-chart"></span>

                    <p>Estadísticas</p>

                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li>
                        <a ui-sref="stats.services">Servicios por estado</a>
                    </li>
                    <li>
                        <a ui-sref="stats.users">Servicios por rutero</a>
                    </li>
                    <!--
                    <li>
                        <a ui-sref="stats.polls">Encuestas</a>
                    </li>
                    -->
                </ul>
            </li>


            <li class="droplink" ui-sref-active="active" ng-show="$hasAnyRole(['admin','team-admin']) && $hasModule('herramientas')">
                <a href class="waves-effect waves-button">
                    <span class="menu-icon fa fa-cog"></span>

                    <p>Configuración</p>

                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li>
                        <a ui-sref="config.preferences">Preferencias</a>
                    </li>
                    <li>
                        <a ui-sref="config.polls">Encuestas</a>
                    </li>
                    <li>
                        <a ui-sref="config.servicesTypes">Categorías de servicios</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>