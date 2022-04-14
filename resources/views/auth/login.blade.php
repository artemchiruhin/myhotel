@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
    <div class="container">
        <h1 class="text-red text-center register-title">Авторизация</h1>
        <form action="" method="POST" class="login-form">
            @if(session()->has('incorrectData'))
                <div class="alert alert-danger fade-in-left" role="alert">
                    {{ session('incorrectData') }}
                </div>
            @endif
            @csrf
            <div class="mb-3">
                <label for="email">Введите эл. адрес</label>
                <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" autofocus>
                @error('email')
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
            <button class="btn btn-red">Войти</button>
            <p class="form-bottom-label">Нет аккаунта? <a href="{{ route('auth.register') }}">Регистрация</a></p>
        </form>
    </div>
@endsection
