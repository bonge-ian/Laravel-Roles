<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        {{-- top bar  --}}
        @include('includes.nav')

        <main class="grid-container">
            <div class="margin-top-1">
                <div class="grid-x grid-padding-x align-center">
                    <div class="small-11 medium-10 cell">
                        @include('includes.alerts')
                    </div>
                </div>
                @yield('content')
            </div>
        </main>

        

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>
