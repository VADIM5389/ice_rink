@extends('layout.index')

@section('main')
<div class="hero-wrap">
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <div class="col-12 col-lg-6">
                <div class="badge-soft mb-3">Арена «Кристалл» • Ледовая арена</div>

                <h1 class="display-5 fw-bold mb-3 hero-title">
                    Катание, билеты и прокат коньков — удобно и онлайн
                </h1>

                <p class="text-muted mb-4 hero-subtitle">
                    Входной билет — <span class="fw-semibold">300₽</span> (один раз).
                    Бронирование коньков — <span class="fw-semibold">150₽/час</span>.
                    Для брони коньков нужен аккаунт.
                </p>

                <div class="d-flex flex-column flex-sm-row gap-2">
                    <a href="{{ route('tickets.buy') }}" class="btn btn-primary btn-lg px-4">
                        Купить билет
                    </a>

                    @auth
                        <a href="{{ route('skates.book') }}" class="btn btn-success btn-lg px-4">
                            Забронировать коньки
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4">
                            Войти для брони
                        </a>
                    @endauth

                    <a href="{{ route('schedule') }}" class="btn btn-outline-primary btn-lg px-4">
                        Расписание
                    </a>
                </div>


            </div>

            <div class="col-12 col-lg-6">
                <div class="hero-card card border-0 shadow-lg rounded-4 p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-muted small">Сегодня</div>
                            <div class="fw-bold fs-4">Свободное катание</div>
                            <div class="text-muted">Проверь ближайшие сеансы в расписании</div>
                        </div>
                        <div class="icon-bubble">❄️</div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-12 col-md-6">
                            <div class="mini-stat">
                                <div class="text-muted small">Билет</div>
                                <div class="fw-bold fs-5">300₽</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mini-stat">
                                <div class="text-muted small">Коньки</div>
                                <div class="fw-bold fs-5">150₽/час</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 p-3 rounded-4" style="background:#f6f9ff;border:1px solid #e2e8f0;">
                        <div class="fw-semibold mb-1">Как это работает</div>
                        <ol class="mb-0 text-muted small ps-3">
                            <li>Покупаешь билет на вход</li>
                            <li>Если нужны коньки — входишь в аккаунт и бронируешь</li>
                            <li>Оплата онлайн</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta mt-5">
            <div class="row align-items-center g-3">
                <div class="col-12 col-lg-8">
                    <div class="fw-bold fs-4 mb-1">Готовы на лёд?</div>
                    <div class="text-muted">Купите билет или войдите в аккаунт для брони коньков.</div>
                </div>
                <div class="col-12 col-lg-4 d-grid gap-2">
                    <a href="{{ route('tickets.buy') }}" class="btn btn-primary btn-lg">Купить билет</a>
                    @auth
                        <a href="{{ route('showAccount') }}" class="btn btn-outline-primary btn-lg">Перейти в профиль</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Создать аккаунт</a>
                    @endauth
                </div>
            </div>
        </div>

    </div>
</div>
@endsection