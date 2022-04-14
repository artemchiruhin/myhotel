@extends('layouts.app')

@section('title', 'Номер')

@section('content')
    <div class="container">
        <livewire:user.room :room="$room"/>
    </div>
@endsection
