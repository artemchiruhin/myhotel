@extends('layouts.admin')

@section('title', 'Должности')

@section('admin-content')
    <h1 class="text-red">Должности</h1>
    <a href="{{ route('admin.positions.create') }}" class="btn btn-success">Создать</a>
    @if(session()->has('positionCreated'))
        <div class="alert alert-success fade-in-left" role="alert">
            {{ session('positionCreated') }}
        </div>
    @endif
    @if(session()->has('positionUpdated'))
        <div class="alert alert-primary fade-in-left" role="alert">
            {{ session('positionUpdated') }}
        </div>
    @endif
    @if(session()->has('positionDeleted'))
        <div class="alert alert-danger fade-in-left" role="alert">
            {{ session('positionDeleted') }}
        </div>
    @endif
    @if(count($positions) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($positions as $position)
            <tr>
                <th>{{ $position->id }}</th>
                <td>{{ $position->name }}</td>
                <td class="action-buttons-cell">
                    <div class="action-buttons">
                        <a href="{{ route('admin.positions.edit', $position) }}" class="btn btn-primary">Изменить</a>
                        <form action="{{ route('admin.positions.destroy', $position) }}" method="POST" class="form-delete">
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
    <h3 class="text-center">Должностей пока нет.</h3>
    @endif

    @include('includes.modal')

@endsection
