<div id="nexo-top" class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="{{ url('/') }}" class="logo-text" style="max-width: 110px; display:block;">
                @if($team->logo)
                    <img class="img-responsive" src="{{ $team->logoUrl('small') }}" alt=""/>
                @else
                    {{str_limit($team->name, 6, '')}}
                @endif
            </a>
        </div>
        <!-- Logo Box -->
        <div class="search-button">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
        </div>
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" ng-controller="notificationsController as notificationsCtrl">
                        @include('partials.notifications')
                    </li>
                    <li class="dropdown">
                        <a href class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                            <span class="user-name">{{ Sentinel::getUser()->name  }} <i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="{{ Sentinel::getUser()->avatarUrl('150') }}" width="40" height="40" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-list" role="menu">
                           <!-- <li role="presentation"><a href="{{ url('profile')  }}"><i class="fa fa-user"></i>Perfil</a></li> -->
                            <li role="presentation"><a href="{{ url('auth/logout')  }}"><i class="fa fa-sign-out m-r-xs"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Nav -->
            </div>
            <!-- Top Menu -->
        </div>
    </div>
</div>