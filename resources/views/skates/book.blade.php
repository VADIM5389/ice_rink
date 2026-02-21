@extends('layout.index')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-7">

            <div class="card border-0 shadow-lg rounded-4 p-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-1">Бронь коньков</h2>
                    <p class="text-muted mb-0">150₽ / 1 час • Доступно только после входа</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('skates.book.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">ФИО</label>
                            <input type="text" name="full_name" class="form-control form-control-lg rounded-3" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Телефон</label>
                            <input type="text" name="phone" class="form-control form-control-lg rounded-3"
                                   placeholder="+7 (___) ___-__-__" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Количество часов</label>
                            <select name="hours" class="form-select form-select-lg rounded-3" required>
                                <option value="1">1 час</option>
                                <option value="2">2 часа</option>
                                <option value="3">3 часа</option>
                                <option value="4">4 часа</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="p-3 rounded-3"
                                 style="background:#f6f9ff; border:1px solid #e2e8f0;">
                                <div class="fw-semibold mb-2">Выбор коньков (необязательно)</div>

                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Размер</label>
                                        <input type="text" name="skate_size" class="form-control rounded-3"
                                               placeholder="Например: 41">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label class="form-label">Модель</label>
                                        <input type="text" name="skate_model" class="form-control rounded-3"
                                               placeholder="Например: Hockey Pro">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success w-100 py-2 rounded-3" type="submit">
                                Забронировать (демо)
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection