@extends('layouts.admin')

@section('title', 'Роли')

@section('admin-content')
    <h1 class="text-red">Роли</h1>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Создать</a>
    @if(session()->has('roleCreated'))
        <div class="alert alert-success fade-in-left" role="alert">
            {{ session('roleCreated') }}
        </div>
    @endif
    @if(session()->has('roleUpdated'))
        <div class="alert alert-primary fade-in-left" role="alert">
            {{ session('roleUpdated') }}
        </div>
    @endif
    @if(session()->has('roleDeleted'))
        <div class="alert alert-danger fade-in-left" role="alert">
            {{ session('roleDeleted') }}
        </div>
    @endif
    @if(count($roles) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Пользователи</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <th>{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->users->pluck('full_name')->implode(', ') }}</td>
                <td class="action-buttons-cell">
                    <div class="action-buttons">
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary">Изменить</a>
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="form-delete">
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
    <h3 class="text-center">Ролей пока нет.</h3>
    @endif
@endsection
