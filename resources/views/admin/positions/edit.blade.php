@extends('layouts.admin')

@section('title', 'Изменить должность')

@section('admin-content')
    <h1 class="text-red mb-5">Изменить должность "{{ $position->name }}"</h1>
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Введите название</label>
            <input type="text" id="name" name="name" value="{{ $position->name }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback fade-in-left">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Изменить</button>
    </form>
    <a href="{{ route('admin.positions.index') }}" class="btn btn-outline-primary mt-3">Назад</a>
@endsection
