<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Avaliação')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Sistema de Avaliação</h1>
            <nav class="main-nav">
                <a href="{{ route('dispositivos.selecionar') }}">Selecionar Dispositivo</a>
                
                @auth
                    <a href="{{ route('relatorios.index') }}" class="{{ request()->routeIs('relatorios.*') ? 'active' : '' }}">Relatórios</a>
                    <a href="{{ route('feedbacks.index') }}" class="{{ request()->routeIs('feedbacks.*') ? 'active' : '' }}">Feedbacks</a>
                    <a href="{{ route('usuarios.index') }}" class="{{ request()->routeIs('usuarios.*') ? 'active' : '' }}">Usuários</a>
                    <a href="{{ route('setores.index') }}" class="{{ request()->routeIs('setores.*') ? 'active' : '' }}">Setores</a>
                    <a href="{{ route('dispositivos.index') }}" class="{{ request()->routeIs('dispositivos.*') ? 'active' : '' }}">Dispositivos</a>
                    <a href="{{ route('perguntas.index') }}" class="{{ request()->routeIs('perguntas.*') ? 'active' : '' }}">Perguntas</a>
                @endauth
            
                <a href="{{ url('/') }}">Avaliação</a>

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline-form">
                        @csrf
                        <button type="submit" style="background: rgba(255,255,255,0.2);">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="site-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p class="anonimo">
                Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
            </p>
            <p class="copy">
                &copy; {{ date('Y') }} - Sistema de Avaliação
            </p>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>