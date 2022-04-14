@extends('layouts.admin')

@section('title', 'Сотрудники')

@section('admin-content')
    <h1 class="text-red">Сотрудники</h1>
    @if(session()->has('employeeUpdated'))
        <div class="alert alert-primary fade-in-left" role="alert">
            {{ session('employeeUpdated') }}
        </div>
    @endif
    @if(session()->has('employeeDeleted'))
        <div class="alert alert-danger fade-in-left" role="alert">
            {{ session('employeeDeleted') }}
        </div>
    @endif
        <livewire:admin.employees-list />
@endsection
