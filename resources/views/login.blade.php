@extends('layout.index')
@section('main')

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-12 col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4 p-4 register-card">

            <div class="text-center mb-4">
                <h2 class="fw-bold text-dark">Вход</h2>
                <p class="text-muted">Войдите, чтобы бронировать каток</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Почта</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control form-control-lg rounded-3" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password"
                           class="form-control form-control-lg rounded-3" required>
                </div>

                <button type="submit" class="btn btn-success w-100 py-2 rounded-3 mb-3">
                    Войти
                </button>
            </form>

            <div class="text-center mb-2">
                <span class="text-muted">Нет аккаунта?  <a href="{{ route('register') }}" >Зарегистрироваться</a></span>
            </div>

            

        </div>
    </div>
</div>

@endsection