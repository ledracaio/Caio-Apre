<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('pessoas.index') }}">Pessoas</a></li>
            <!-- Adicione mais links conforme necessário -->
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
