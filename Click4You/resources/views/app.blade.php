<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Click4You</title>

        @vite(['resources/css/app.css',
                'resources/css/components/header.css',
                'resources/css/components/nav-user.css'])

        @vite(['resources/js/login-header.js'])
    </head>
    <body>
        @include('components.header')
        @include('components.navigation-user')

        @yield('content')
    </body>
</html>
