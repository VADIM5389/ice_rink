@extends('layout.index')
@section('main')

<div class="container">
    <div class="form-register">
        <div class="form-register__header">
            <h1>Регистрация</h1>
        </div>

        <div class="form-register__form">
            {{-- ошибки валидации --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <label>ФИО</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required>

                <label>Почта</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>Телефон</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required>

                <label>Пароль</label>
                <input type="password" name="password" required>

                <label>Повтор пароля</label>
                <input type="password" name="password_confirmation" required>

                <input type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
</div>

@endsection