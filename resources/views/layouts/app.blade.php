<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/5501f28243.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/nagoyameshi.css') }}" rel="stylesheet">
    </head>
    <body class="bg-white">
        <div id="app">
        @component('components.header')
        @endcomponent

        <main class="py-4 mb-5">
            @yield('content')
        </main>
        @component('components.footer')
        @endcomponent
        </div>
    </body>
</html>
