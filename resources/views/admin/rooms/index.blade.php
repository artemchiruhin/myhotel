@extends('layouts.admin')

@section('title', 'Номера')

@section('admin-content')
    <h1 class="text-red">Номера</h1>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">Добавить</a>
    @if(session()->has('roomCreated'))
        <div class="alert alert-success fade-in-left" role="alert">
            {{ session('roomCreated') }}
        </div>
    @endif
    @if(session()->has('roomUpdated'))
        <div class="alert alert-primary fade-in-left" role="alert">
            {{ session('roomUpdated') }}
        </div>
    @endif
    @if(session()->has('roomDeleted'))
        <div class="alert alert-danger fade-in-left" role="alert">
            {{ session('roomDeleted') }}
        </div>
    @endif


    <livewire:admin.rooms-list />

@endsection
