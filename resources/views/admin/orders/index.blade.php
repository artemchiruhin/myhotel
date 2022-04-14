@extends('layouts.admin')

@section('title', 'Брони')

@section('admin-content')
    <h1 class="text-red">Брони</h1>
    <div class="d-flex justify-content-end">
        <form action="{{ route('admin.orders.report') }}" method="POST">
            @csrf
            <button class="btn btn-red">Отчет на почту</button>
        </form>
    </div>
    @if(session()->has('orderConfirmed'))
        <div class="alert alert-primary mt-3 fade-in-left" role="alert">
            {{ session('orderConfirmed') }}
        </div>
    @endif
    @if(session()->has('reportSent'))
        <div class="alert alert-primary mt-3 fade-in-left" role="alert">
            {{ session('reportSent') }}
        </div>
    @endif
    @if(session()->has('reportNotSent'))
        <div class="alert alert-primary mt-3 fade-in-left" role="alert">
            {{ session('reportNotSent') }}
        </div>
    @endif
    @if(count($orders) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Номер</th>
                <th>Клиент</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Стоимость</th>
                <th>Дата броинрования</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th>{{ $order->id }}</th>
                    <td>{{ $order->room->number }}</td>
                    <td>{{ $order->user->full_name }}</td>
                    <td>{{ date('d.m.Y', strtotime($order->date_from)) }}</td>
                    <td>{{ date('d.m.Y', strtotime($order->date_to)) }}</td>
                    <td>{{ $order->cost }} руб.</td>
                    <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
                    <td>{{ $order->status ?? 'Не подтверждено' }}</td>
                    <td>
                        @if($order->status !== 'Подтверждено')
                        <div class="action-buttons">
                            <form action="{{ route('admin.orders.confirm', $order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success">Подтвердить</button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center">Брони пока нет</h3>
    @endif
@endsection
