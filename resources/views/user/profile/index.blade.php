@extends('layouts.app')

@section('title', 'Ваш профиль')

@section('content')
    <div class="container">
        <h2 class="text-red mt-4">Добро пожаловать, {{ auth()->user()->full_name }}!</h2>
        <p>Это ваш профиль</p>
        <h3 class="text-red mt-5">История бронирований</h3>
        @if(count($orders) > 0)
            <div class="user-orders-table-container">
                <table class="table orders-table mt-4">
                    <thead>
                        <tr class="text-red">
                            <th>№</th>
                            <th>Номер</th>
                            <th>Дата начала</th>
                            <th>Дата окончания</th>
                            <th>Стоимость</th>
                            <th>Статус</th>
                            <th>Дата броинрования</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $index => $order)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>
                                <a class="text-red" href="{{ route('rooms.show', $order) }}">Номер {{ $order->room->number }}</a>
                            </td>
                            <td>{{ date('d.m.Y', strtotime($order->date_from)) }}</td>
                            <td>{{ date('d.m.Y', strtotime($order->date_to)) }}</td>
                            <td>{{ $order->cost }} руб.</td>
                            <td>{{ $order->status ?? 'Не подтверждено' }}</td>
                            <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>У вас не было заказов.</p>
        @endif
    </div>
@endsection
