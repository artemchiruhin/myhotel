@extends('layouts.admin')

@section('title', 'График уборки номера')

@section('admin-content')
    <h1 class="text-red">График уборки номера {{ $room->number }}</h1>
    @if(count($cleans) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>№</th>
                <th>Дата и время начала</th>
                <th>Дата и время окончания</th>
                <th>Уборщик (ца)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cleans as $index => $clean)
            <tr>
                <th>{{ $index + 1 }}</th>
                <td>{{ $clean->date_from->format('d.m.Y') . ' ' . substr($clean->time_from, 0, 5) }}</td>
                <td>{{ $clean->date_to->format('d.m.Y') . ' ' . substr($clean->time_to, 0, 5) }}</td>
                <td>{{ $clean->employee->full_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h4 class="text-center">Уборок в этом номере нет.</h4>
    @endif
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-primary">Назад</a>
@endsection
