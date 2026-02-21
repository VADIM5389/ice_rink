@extends('layout.index')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <div class="card border-0 shadow-lg rounded-4 p-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-1">Купить билет</h2>
                    <p class="text-muted mb-0">Вход на каток оплачивается один раз</p>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3 rounded-3"
                     style="background:#f6f9ff; border:1px solid #e2e8f0;">
                    <div>
                        <div class="fw-semibold">Входной билет</div>
                        <div class="text-muted small">Доступ на каток после оплаты</div>
                    </div>
                    <div class="fw-bold fs-4">300₽</div>
                </div>

                <form action="{{ route('tickets.pay') }}" method="POST" class="mt-4">
                    @csrf

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                        Оплатить 300₽ (демо)
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection