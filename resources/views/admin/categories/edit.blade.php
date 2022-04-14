@extends('layouts.admin')

@section('title', 'Изменить категорию')

@section('admin-content')
    <h1 class="text-red mb-5">Изменить категорию "{{ $category->name }}"</h1>
    <form action="{{ route('admin.categories.edit', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Введите название</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback fade-in-left">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Изменить</button>
    </form>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary mt-3">Назад</a>
@endsection
