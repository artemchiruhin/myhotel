@extends('layouts.admin')

@section('title', 'Задания сотрудника')

@section('admin-content')
    <h1 class="text-red">Задания сотрудника {{ $employee->full_name }}</h1>
    <a href="{{ route('admin.employees.tasks.create', $employee) }}" class="btn btn-success">Создать</a>
    @if(session()->has('taskCreated'))
        <div class="alert alert-success mt-3 fade-in-left" role="alert">
            {{ session('taskCreated') }}
        </div>
    @endif
    @if(session()->has('taskUpdated'))
        <div class="alert alert-primary mt-3 fade-in-left" role="alert">
            {{ session('taskUpdated') }}
        </div>
    @endif
    @if(session()->has('taskDeleted'))
        <div class="alert alert-danger mt-3 fade-in-left" role="alert">
            {{ session('taskDeleted') }}
        </div>
    @endif
    @if(count($tasks) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Текст задания</th>
                <th>Начало</th>
                <th>Окончание</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $index => $task)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $task->text }}</td>
                    <td>{{ $task->date_from->format('d.m.Y') . ' ' . substr($task->time_from, 0, 5) }}</td>
                    <td>{{ $task->date_to->format('d.m.Y')  . ' ' . substr($task->time_to, 0, 5) }}</td>
                    <td class="action-buttons-cell">
                        <div class="action-buttons">
                            <form action="{{ route('admin.employees.tasks.destroy', [$employee, $task]) }}" method="POST" class="form-delete">
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
        <h3 class="text-center">Заданий пока нет</h3>
    @endif

    <a href="{{ route('admin.employees.index') }}" class="btn btn-red-outline">Назад</a>

    @include('includes.modal')

@endsection
