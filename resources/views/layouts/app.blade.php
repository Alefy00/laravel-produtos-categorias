<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Produtos')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-dvh flex-col bg-slate-50 text-slate-800">
    <!-- Topbar -->
    <header class="border-b border-slate-200 bg-white/80 backdrop-blur">
        <div class="mx-auto max-w-6xl px-4">
            <div class="flex h-14 items-center justify-between">
                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-900">
                    Sistema de Produtos
                </a>
                <nav class="flex items-center gap-4">
                    <a href="{{ route('categorias.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Categorias</a>
                    <a href="{{ route('produtos.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Produtos</a>
                    <form action="{{ url('/logout') }}" method="POST" class="inline">
                        @csrf
                        <button
                            type="submit"
                            class="rounded-lg bg-slate-900 px-3 py-1.5 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300"
                        >
                            Sair
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page container -->
    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-6">
        @if (session('success'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 p-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer fixo no fim -->
    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-4 text-center text-xs text-slate-500">
            Laravel 11 • TailwindCSS • Desafio Técnico
        </div>
    </footer>
</body>
</html>
