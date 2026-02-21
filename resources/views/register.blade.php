@extends('layout.index')
@section('main')

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-12 col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4 p-4 register-card">
            
            <div class="text-center mb-4">
                <h2 class="fw-bold text-dark">Регистрация на каток</h2>
                <p class="text-muted">Создайте аккаунт и бронируйте лёд</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">ФИО</label>
                    <input type="text" name="full_name" class="form-control form-control-lg rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Почта</label>
                    <input type="email" name="email" class="form-control form-control-lg rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Телефон</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control form-control-lg rounded-3 phone-mask"
                        placeholder="+7 (___) ___-__-__"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control form-control-lg rounded-3" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Повтор пароля</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-3" required>
                </div>

                <button type="submit" class="btn btn-success w-100 py-2 rounded-3 mb-3">
                    Зарегистрироваться
                </button>

                <div class="text-center mb-2">
                    <span class="text-muted">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></span>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection