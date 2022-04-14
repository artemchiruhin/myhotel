@extends('layouts.admin')

@section('title', 'Изменить номер')

@section('admin-content')
    <h2 class="text-red mb-5">Изменить номер</h2>
    <livewire:admin.edit-room-form :categories="$categories" :room="$room" />
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-primary mt-3">Назад</a>
@endsection
