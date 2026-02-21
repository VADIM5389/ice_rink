<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    @guest
        <a href="{{ route('showRegister') }}">Регистрация</a>
        <a href="{{ route('showLogin') }}">Авторизация</a>
    @endguest
    @auth

            <form action="{{ route('logout') }}" method="GET">
                <input type="submit" value="Выйти">
            </form>
    @endauth
</header>
<main>

    @if(session('success'))
        <div class="message-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="message-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="message-validate">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    @yield('main')
</main>
<footer>
    footer
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
