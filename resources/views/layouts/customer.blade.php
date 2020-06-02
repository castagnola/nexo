<!DOCTYPE html>
<html ng-app="customer">
<head lang="{{ $user->lang }}">

    <!-- Title -->
    <title>{{ $title }}</title>

    <base href="/customer">

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Nexo Logística"/>
    <meta name="author" content="Pulse & 80studio"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! webpack('css', 'vendor') !!}
    {!! webpack('css', 'app') !!}
    {!! style('/static/css/style.css'); !!}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script>
        document.createElement('ui-select');
        document.createElement('ui-select-match');
        document.createElement('ui-select-choices');
    </script>
    <![endif]-->

    <script>
        window.NEXO = {
            base_url: '/',
            api_url: '/api/',
            ui_url: '/ui/',
            //template_url: '{{ isset($templateUrl) ? $templateUrl : url('/ui/template') . '?name='  }}',
            template_url: '{{ isset($templateUrl) ? $templateUrl : url('/customer/template') . '?name='  }}',
            ws_url: '{{env('WEBSOCKET_URL', url('/') . ':6001')}}',
            uid: "{{$user->id}}"
        };
    </script>

    <style>
        #nexo-avatar {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
        }
        md-toolbar.md-nexo-theme:not(.md-menu-toolbar) {
            background-color: rgb(244,67,54);
            color: rgb(255,255,255);
        }
    </style>

    @include('js_vars')
</head>


<body layout="column" layout-fill ui-i18n="es"  ng-strict-di ng-cloak data-ng-controller="InitCtrl">
    <app layout="column" layout-fill="" flex="100" class="layout-fill ng-isolate-scope layout-column flex-100">
        <div class="nexo-app layout-row" layout="row">
            <nx-sidenav is-team="vm.isTeam" class="ng-isolate-scope">
                <md-sidenav class="md-sidenav-left sidenav-component md-closed ng-isolate-scope open-menu"  md-is-locked-open="$mdMedia('gt-sm')" md-disable-backdrop="" tabindex="-1" md-component-id="left" >
                    <md-toolbar>
                        <div id="nexo-avatar" class="logo" style="background-image: url([[ vm.logo ]]);">
                            <div></div>
                        </div>
                    </md-toolbar>
                    <md-content md-theme="default" flex="" class="md-default-theme flex">
                        <ul class="menu">
                            <li ng-repeat="menu in vm.menu" class="ng-scope">
                                <a class="md-button ng-scope md-default-theme md-ink-ripple" ui-sref="dashboard" ng-if="!menu.children" href="[[ menu.url ]]" aria-label="Dashboard"><span class="ng-binding ng-scope" translate="[[ menu.name ]]">
                                </span><div class="md-ripple-container"></div></a>
                            </li>
                            <li>
                                <a class="md-button md-default-theme md-ink-ripple" href="/logout" target="_self" aria-label="Salir">
                                    <span class="ng-binding ng-scope">Salir</span>
                                </a>
                            </li>
                        </ul>
                    </md-content>
                    <md-menu class="lang-button md-menu ng-scope">
                        <button class="md-block md-button md-ink-ripple" type="button" aria-label="Abrir menu de cambio de lenguaje" md-menu-origin="" ng-click="$mdOpenMenu($event)" aria-haspopup="true" aria-expanded="false" aria-owns="menu_container_0">
                            <span class="ng-binding ng-scope">[[ 'LANG' | translate ]]</span>
                        </button>
                        <md-menu-content width="4" role="menu">
                            <md-menu-item ng-if="vm.currentLang == 'es' || vm.currentLang == 'en'" class="ng-scope">
                                <button class="md-button md-ink-ripple" type="button" ng-click="vm.changeLang('pt')" role="menuitem" aria-label="Português">
                                    <span class="ng-scope">Português</span>
                                </button>
                            </md-menu-item>
                            <md-menu-item ng-if="vm.currentLang == 'pt' || vm.currentLang == 'en'" class="ng-scope">
                                <button class="md-button md-ink-ripple" type="button" ng-click="vm.changeLang('es')" role="menuitem" aria-label="Português">
                                    <span class="ng-scope">Español</span>
                                </button>
                            </md-menu-item>
                             <md-menu-item ng-if="vm.currentLang == 'es' || vm.currentLang == 'pt'" class="ng-scope">
                                <button class="md-button md-ink-ripple" type="button" ng-click="vm.changeLang('en')" role="menuitem" aria-label="Português">
                                    <span class="ng-scope">Inglés</span>
                                </button>
                            </md-menu-item>
                        </md-menu-content>
                    </md-menu>
                </md-sidenav>
            </nx-sidenav>

            <div layout="column" flex="" role="main" tabindex="-1" class="layout-column flex">
                <nx-header title="asdas" class="ng-isolate-scope">
                    <md-toolbar class="md-whiteframe-3dp md-nexo-theme" md-theme="nexo">
                        <div class="md-toolbar-tools">
                            <md-button class="md-icon-button" aria-label="Settings" ng-click="vm.openLeftMenu()">
                              <md-icon md-svg-icon="{{ url('/static/svg/menu.svg') }}"></md-icon>
                            </md-button>
                            <div ncy-breadcrumb="" class="ng-isolate-scope">
                                <h3 class="md-toolbar-item md-breadcrumb md-headline">
                                    <span class="md-breadcrumb-page ng-binding ng-scope" ng-if="vm.name" ng-cloak>[[ vm.name  ]]</span>
                                </h3>
                            </div>
                            <span flex="" class="flex"></span>
                        </div>
                    </md-toolbar>
                </nx-header>
                <md-content flex="" layout="column" md-scroll-y="" class="layout-column flex">
                    <div ui-view="" flex="noshrink" class="ng-scope flex-noshrink">
                        <ng-view></ng-view>
                    </div>
                </md-content>
            </div>
        </div>
    </app>

@yield('content')


{!! webpack('js', 'vendor') !!}
{!! webpack('js', 'app') !!}
{!! script('/static/js/angular/angular-route.min.js'); !!}
{!! script('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'); !!}
{!! script('/static/js/app.js'); !!}
{!! script('/static/js/route.js'); !!}
<!-- {!! script('/static/js/controllers.js'); !!} -->
{!! script('/static/js/controllers/init.js'); !!}
{!! script('/static/js/controllers/customer.js'); !!}
{!! script('/static/js/controllers/assignment.js'); !!}
{!! script('/static/js/controllers/dialog.js'); !!}
{!! script('/static/js/controllers/user.js'); !!}
{!! script('/static/js/controllers/poll.js'); !!}
{!! script('/static/js/controllers/history.js'); !!}

{!! script('/static/js/function.js'); !!}
{!! script('/static/js/main.js'); !!}

</body>
</html>
