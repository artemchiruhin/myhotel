@extends('layouts.admin')

@section('title', 'Добавить задание')

@section('admin-content')
    <h1 class="text-red mb-5">Добавить задание сотруднику {{ $employee->full_name }}</h1>
    <livewire:admin.tasks.create-task :employee="$employee"  />
    <a href="{{ route('admin.employees.tasks.index', $employee) }}" class="btn btn-red-outline mt-3">Назад</a>

@endsection
