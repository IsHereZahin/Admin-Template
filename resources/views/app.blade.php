<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Admin Template Fonts and Icons -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Admin Template CSS -->
        <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="g-sidenav-show bg-gray-100">
        @inertia
    </body>
</html>
