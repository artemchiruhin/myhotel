<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @livewireStyles
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navigation">
        <div class="logo">
            <a href="{{ route('index') }}">my<span>hotel</span></a>
        </div>
        <ul class="menu">
            @if(auth()->check() && auth()->user()->role->name === 'Администратор')
            <li class="menu-item">
                <a href="{{ route('admin.index') }}">Панель администратора</a>
            </li>
            @endif
        </ul>
        <div class="nav-buttons">
            @guest
                <a href="{{ route('auth.login') }}" class="btn btn-red">Вход</a>
                <a href="{{ route('auth.register') }}" class="btn btn-red-outline">Регистрация</a>
            @endguest
            @auth
                <a href="{{ route('user.profile') }}" class="text-red">{{ auth()->user()->email }}</a>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-red-outline">Выйти</button>
                </form>
            @endauth
        </div>
    </nav>
    @yield('content')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @livewireScripts
</body>
</html>
