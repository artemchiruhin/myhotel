@extends('layouts.admin')

@section('title', 'Создать роль')

@section('admin-content')
    <h1 class="text-red mb-5">Создать роль</h1>
    <form action="{{ route('admin.roles.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Введите название</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback fade-in-left">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success">Создать</button>
    </form>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-primary mt-3">Назад</a>
@endsection
