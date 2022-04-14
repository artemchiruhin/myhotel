@extends('layouts.admin')

@section('title', 'Панель администратора')

@section('admin-content')
    <div class="welcome">
        <h1 class="text-red">Панель администратора</h1>
        <p>Добро пожаловать, {{ auth()->user()->full_name }}!</p>
        <p><em class="text-red">Сегодня {{ date('d.m.Y') }}</em></p>
    </div>
    <div class="info">
        <div class="info-block users text-center">
            <h3 class="text-red">{{ $users }}</h3>
            <p>Количество пользователей</p>
        </div>
        <div class="info-block employees text-center">
            <h3 class="text-red">{{ $employees }}</h3>
            <p>Количество сотрудников</p>
        </div>
        <div class="info-block orders text-center">
            <h3 class="text-red">{{ $orders }}</h3>
            <p>Количество бронирований</p>
        </div>
    </div>
@endsection
