<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CINEL')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body style="min-height: 100vh; display: flex; flex-direction: column;">

    @include('partials.header')

    <main style="flex: 1;">
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
