<!DOCTYPE html>
<html>
<head lang="{{ $user->lang }}">

    <!-- Title -->
    <title>{{ $title }}</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Nexo Logística"/>
    <meta name="author" content="Pulse & 80studio"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! webpack('css', 'vendor') !!}
    {!! webpack('css', 'app') !!}

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
            template_url: '{{ isset($templateUrl) ? $templateUrl : url('/ui/template') . '?name='  }}',
            ws_url: '{{env('WEBSOCKET_URL', url('/') . ':6001')}}',
            uid: "{{$user->id}}"
        };
    </script>

    @include('js_vars')
</head>


<body layout="column" layout-fill ui-i18n="es" ng-app="app" ng-strict-di ng-cloak>

@yield('content')

<!-- {!! script('http://momentjs.com/downloads/moment.min.js'); !!}
{!! script('https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.3.0/moment-timezone.js'); !!} -->
{!! webpack('js', 'vendor') !!}
{!! webpack('js', 'app') !!}

</body>
</html>
