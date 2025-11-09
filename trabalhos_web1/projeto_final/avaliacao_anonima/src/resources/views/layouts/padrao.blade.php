<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Avaliação')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body>
    <header>
        <h1>Sistema de Avaliação</h1>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <hr>
    <footer>
        <p>&copy; {{ date('Y') }} - Sistema de Avaliação</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>