@extends('layout.index')

@section('main')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold mb-1">Контакты</h2>
        <p class="text-muted mb-0">Арена «Кристалл» — как нас найти и как с нами связаться</p>
    </div>

    <div class="row g-4">
        <!-- Карточка контактов -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 p-4 h-100 contact-card">
                <h5 class="fw-bold mb-3">Связаться с нами</h5>

                <div class="mb-3">
                    <div class="text-muted small">Телефон</div>
                    <div class="fw-semibold"> +7 (3522) 23-90-90 </div>
                </div>

                <div class="mb-3">
                    <div class="text-muted small">Почта</div>
                    <div class="fw-semibold">infokatok@kristall-arena.ru</div>
                </div>

                <div class="mb-3">
                    <div class="text-muted small">Адрес</div>
                    <div class="fw-semibold">г. Курган, Сибирская ул., 1А</div>
                </div>

                <div class="mb-4">
                    <div class="text-muted small">Часы работы</div>
                    <div class="fw-semibold">Ежедневно: 08:00 – 22:00</div>
                </div>

                <div class="d-grid gap-2">
                    <a class="btn btn-primary rounded-3" href="{{ route('tickets.buy') }}">Купить билет</a>
                    @auth
                        <a class="btn btn-success rounded-3" href="{{ route('skates.book') }}">Забронировать коньки</a>
                    @else
                        <a class="btn btn-success rounded-3" href="{{ route('login') }}">Войти для брони коньков</a>
                    @endauth
                </div>

                <div class="mt-4 text-muted small">
                    для бронирования коньков нужна авторизация.
                </div>
            </div>
        </div>

        <!-- Карта -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 p-2 map-card">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3Af5c085a76ebbf3597080f25d6455895d3e7b66568c2968a8bd4e5d5f74d13082&amp;source=constructor"
                        frameborder="0"
                        allowfullscreen="true">
                    </iframe>
                </div>
            </div>

            <!-- Мини карточки под картой -->
            <div class="row g-3 mt-3">
                <div class="col-12 col-md-4">
                    <div class="mini-card p-3 rounded-4">
                        <div class="fw-bold">Парковка</div>
                        <div class="text-muted small">Бесплатная рядом со входом</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mini-card p-3 rounded-4">
                        <div class="fw-bold">Прокат коньков</div>
                        <div class="text-muted small">150₽/час, размеры 28–46</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mini-card p-3 rounded-4">
                        <div class="fw-bold">Оплата</div>
                        <div class="text-muted small">Онлайн (ЮKassa) и на кассе</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection