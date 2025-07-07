<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CINEL')</title>

    {{-- Feuille de style commune --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Feuilles de style spécifiques à une page --}}
    @yield('styles')
</head>
<body>

    @include('partials.header')

    {{-- Contenu principal --}}
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
