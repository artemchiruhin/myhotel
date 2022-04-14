<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body style="background: #fff">
<div class="admin-container">
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="logo"><a href="/">my<span>hotel</span></a></div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button class="btn btn-red-outline"><i class="fa-solid fa-arrow-right-from-bracket"></i> Выход</button>
            </form>
        </div>
        <ul class="admin-menu">
            <li class="admin-menu-item @if(route('admin.index') === url()->current()) active-item @endif">
                <a href="{{ route('admin.index') }}">Главная</a>
            </li>
            <li class="admin-menu-item @if(route('admin.categories.index') === url()->current() || \Illuminate\Support\Facades\Request::segment(2) === 'categories') active-item @endif">
                <a href="{{ route('admin.categories.index') }}">Категории</a>
            </li>
            <li class="admin-menu-item @if(route('admin.employees.index') === url()->current() || \Illuminate\Support\Facades\Request::segment(2) === 'employees') active-item @endif">
                <a href="{{ route('admin.employees.index') }}">Сотрудники</a>
            </li>
            <li class="admin-menu-item @if(route('admin.roles.index') === url()->current() || \Illuminate\Support\Facades\Request::segment(2) === 'roles') active-item @endif">
                <a href="{{ route('admin.roles.index') }}">Роли</a>
            </li>
            <li class="admin-menu-item @if(route('admin.positions.index') === url()->current() || \Illuminate\Support\Facades\Request::segment(2) === 'positions') active-item @endif">
                <a href="{{ route('admin.positions.index') }}">Должности</a>
            </li>
            <li class="admin-menu-item @if(route('admin.rooms.index') === url()->current() || \Illuminate\Support\Facades\Request::segment(2) === 'rooms') active-item @endif">
                <a href="{{ route('admin.rooms.index') }}">Номера</a>
            </li>
            <li class="admin-menu-item @if(route('admin.orders.index') === url()->current()) active-item @endif">
                <a href="{{ route('admin.orders.index') }}">Бронирования</a>
            </li>
        </ul>
    </aside>
    <div class="admin-content">
        @yield('admin-content')
    </div>
</div>
<script src="{{ asset('js/admin.js') }}"></script>
@livewireScripts
</body>
</html>
