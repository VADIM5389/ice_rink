<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        // если у тебя файл лежит resources/views/register.blade.php
        return view('register');
        // если лежит в resources/views/auth/register.blade.php -> return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|min:2|max:255',
            'email'     => 'required|email|max:255|unique:users,email',
            'phone'     => 'required|string|min:5|max:30',
            'password'  => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'Эта почта уже занята!',
            'email.email'  => 'Введите корректную почту',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'role'      => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Вы успешно зарегистрировались!');
    }

    public function showLogin()
    {
        return view('login');
        // если лежит в resources/views/auth/login.blade.php -> return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // 1) пробуем стандартный способ Laravel
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'user') {
                return redirect()->route('showAccount')
                    ->with('success', 'Добро пожаловать в личный кабинет пользователя');
            }

            return redirect()->route('showAdmin')
                ->with('success', 'Добро пожаловать в админ панель');
        }

        return redirect()->route('login')->with('error', 'Неверная почта или пароль!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}