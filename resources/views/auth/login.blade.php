<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-dvh bg-slate-50 text-slate-800">
    <div class="grid place-items-center min-h-dvh p-4">
        <div class="w-full max-w-sm rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="mb-1 text-2xl font-semibold">Entrar</h1>
            <p class="mb-6 text-sm text-slate-500">Acesse com suas credenciais</p>

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                    />
                </div>

                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                    />
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300"
                >
                    Entrar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
