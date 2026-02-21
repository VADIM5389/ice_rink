@extends('layout.index')
@section('main')

<div class="container">
    <div class="form-register">
        <div class="form-register__header">
            <h1>Авторизация</h1>
        </div>
        <div class="form-register__form">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <label>Почта</label>
                <input type="email" name="email" required>

                <label>Пароль</label>
                <input type="password" name="password" required>

                <input type="submit" value="Войти">
            </form>
        </div>
    </div>
</div>

@endsection