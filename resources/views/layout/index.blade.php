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

    <!-- Верхняя часть с логотипом -->
    <div class="top-header text-center py-3">
        <h1 class="logo m-0">ICE RINK</h1>
    </div>

    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top border-bottom">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                <ul class="navbar-nav align-items-center gap-3">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Главная</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Расписание</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Цены</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>

                    <li class="nav-item ms-lg-4">
                        <a href="#" class="btn btn-primary px-4">
                            Купить билет
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

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
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container text-center">
        <p class="mb-1">© 2025 ICE RINK</p>
        <p class="mb-0 small text-muted">
            Ледовый каток • Бронирование билетов онлайн
        </p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
