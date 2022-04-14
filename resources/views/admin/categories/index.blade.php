@extends('layouts.admin')

@section('title', 'Категории')

@section('admin-content')
    <h1 class="text-red">Категории</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Создать</a>
    @if(session()->has('categoryCreated'))
        <div class="alert alert-success mt-3 fade-in-left" role="alert">
            {{ session('categoryCreated') }}
        </div>
    @endif
    @if(session()->has('categoryUpdated'))
        <div class="alert alert-primary mt-3 fade-in-left" role="alert">
            {{ session('categoryUpdated') }}
        </div>
    @endif
    @if(session()->has('categoryDeleted'))
        <div class="alert alert-danger mt-3 fade-in-left" role="alert">
            {{ session('categoryDeleted') }}
        </div>
    @endif
    @if(count($categories) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th>{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td class="action-buttons-cell">
                    <div class="action-buttons">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Изменить</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <h3 class="text-center">Категорий пока нет</h3>
    @endif

    @include('includes.modal')

@endsection
