<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-app>
            <v-card flat width="400" class="mx-auto mt-5">
                <v-card-title class="justify-center">
                <h4 class="font-weight-red red--text">Sorry! Page Not Available</h4>
                </v-card-title>
                <v-card-text>
                    <v-img src="/img/notify.svg"></v-img>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <a href="{{ route('index')}}">
                        <v-btn small depressed color="info">Go back home</v-btn>
                    </a>
                </v-card-actions>
            </v-card>
        </v-app>
</body>
</html>
