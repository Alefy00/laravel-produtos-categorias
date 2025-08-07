<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Produtos')</title>
</head>
<body>
    <nav>
        <a href="{{ url('/dashboard') }}">Dashboard</a> |
        <a href="{{ route('categorias.index') }}">Categorias</a> |
        <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </nav>

    <hr>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
