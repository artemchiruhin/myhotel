@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <h1 class="text-red text-center register-title">Регистрация</h1>
        <form action="{{ route('auth.register') }}" method="POST" class="register-form">
            @csrf
            <div class="mb-3">
                <label for="email">Введите эл. адрес</label>
                <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" autofocus>
                @error('email')
                <span class="invalid-feedback fade-in-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="full_name">Введите ФИО</label>
                <input type="text" id="full_name" value="{{ old('full_name') }}" name="full_name" class="form-control @error('full_name') is-invalid @enderror">
                @error('full_name')
                <span class="invalid-feedback fade-in-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone">Введите телефон</label>
                <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="89999999999">
                @error('phone')
                <span class="invalid-feedback fade-in-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Введите пароль</label>
                <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback fade-in-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password2">Повторите пароль</label>
                <input type="password" id="password2" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <span class="invalid-feedback fade-in-left">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-red">Зарегистрироваться</button>
            <p class="form-bottom-label">Есть аккаунт? <a href="{{ route('auth.login') }}">Авторизация</a></p>
        </form>
    </div>
@endsection
