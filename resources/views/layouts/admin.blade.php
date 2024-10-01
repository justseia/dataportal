<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.svg') }}">
        <title>{{ env('APP_NAME') }}</title>
        <link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>

        @if (!Route::is('admin.auth.index'))
            @include('components.admin.header')
        @endif

        @yield('content')

        @include('components.admin.alert')

        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
        <script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/demo.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/litepicker.js') }}" defer></script>
    </body>

</html>
