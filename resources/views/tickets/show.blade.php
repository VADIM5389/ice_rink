@extends('layout.index')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card p-4 rounded-4 border-0 shadow-lg">
                <h2 class="fw-bold mb-2">Ваш билет</h2>
                <p class="text-muted mb-3">Сохраните код билета или зарегистрируйтесь, чтобы он был в профиле.</p>

                <div class="p-3 rounded-4" style="background:#f6f9ff;border:1px solid #e2e8f0;">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="fw-semibold">Входной билет</div>
                            <div class="text-muted small">Код: <span class="fw-semibold">{{ $ticket->code }}</span></div>
                        </div>
                        <div class="fw-bold fs-5">{{ $ticket->amount }}₽</div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a class="btn btn-success w-100" href="{{ route('login') }}">Войти</a>
                    <a class="btn btn-primary w-100" href="{{ route('register') }}">Регистрация</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection