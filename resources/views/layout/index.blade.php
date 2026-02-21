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
    <div class="text-center py-3">
        <h1 class="logo m-0">Кристалл</h1>
        <small class="arena-subtitle">Ледовая арена</small>
    </div>

    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top border-bottom">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav align-items-center gap-2 mx-lg-auto">

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
                        <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                    </li>

                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ route('skates.book') }}">Бронь коньков</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Бронь коньков</a>
                        @endauth
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary px-4 ms-lg-3" href="{{ route('tickets.buy') }}">
                            Купить билет
                        </a>
                    </li>
                </ul>

                <!-- Блок авторизации справа -->
                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    @auth
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAccount') }}">Профиль</a>
                        </li>
                    @endauth
                        <span class="fw-semibold text-dark">
                            {{ Auth::user()->full_name }}
                        </span>

                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Выйти
                            </button>
                        </form>
                    @else
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">
                            Войти
                        </a>
                        <a class="btn btn-success" href="{{ route('register') }}">
                            Регистрация
                        </a>
                    @endauth
                </div>

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
        <p class="mb-1">© 2025 Арена «Кристалл»</p>
        <p class="mb-0 small text-muted">
            Ледовый каток • Бронирование билетов онлайн
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>