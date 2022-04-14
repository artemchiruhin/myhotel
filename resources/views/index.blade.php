@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <h1 class="text-red">Все номера</h1>
        <div class="rooms">
            @foreach($rooms as $room)
            <div class="room-block @if(($loop->index + 1) % 3 !== 0) {{ get_random_css_class($classes) }} @endif">
                <div class="room-block__img">
                    <img src="{{ get_image_path(json_decode($room->images)[0]) }}" alt="Номер {{ $room->number }}">
                </div>
                <div class="room-block__text">
                    <h3 class="text-red">Номер {{ $room->number }}</h3>
                    <p>Этаж: {{ $room->floor }}</p>
                    <p>Количество комнат: {{ $room->rooms_number }}</p>
                    <p>Категория: {{ $room->category->name }}</p>
                    <p>Цена за сутки: <strong class="text-red">{{ $room->price_per_day }} руб.</strong></p>
                    <a href="{{ route('rooms.show', $room) }}" class="btn btn-red">Подробнее</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $rooms->links('layouts.pagination') }}
    </div>
@endsection
