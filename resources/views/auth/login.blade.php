<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Senha:</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
