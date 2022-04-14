@extends('layouts.admin')

@section('title', 'Изменить задание')

@section('admin-content')
    <h1 class="text-red mb-5">Изменить задание сотруднику {{ $employee->full_name }}</h1>
    <livewire:admin.tasks.edit-task :employee="$employee" :task="$task" />
    <a href="{{ route('admin.employees.tasks.index', $employee) }}" class="btn btn-red-outline mt-3">Назад</a>

@endsection
