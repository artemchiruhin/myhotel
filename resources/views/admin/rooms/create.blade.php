@extends('layouts.admin')

@section('title', 'Добавить номер')

@section('admin-content')
    <h2 class="text-red mb-5">Добавить номер</h2>
    <form method="POST" action="{{ route('admin.rooms.create') }}" enctype="multipart/form-data">
        @csrf
        @error('formError')
        <div class="danger alert-danger p-2 mb-2 fade-in-left">
            <i class="fas fa-times-circle"></i>
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label for="number" class="form-label">Введите номер</label>
            <input type="number" name="number" value="{{ old('number') }}" class="form-control @error('number') is-invalid @enderror" id="number">
            @error('number')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price-per-day" class="form-label">Введите цену за сутки</label>
            <input type="number" name="price_per_day" value="{{ old('price_per_day') }}" class="form-control @error('price_per_day') is-invalid @enderror" id="price-per-day">
            @error('price_per_day')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms-number" class="form-label">Введите кол-во комнат</label>
            <input type="number" name="rooms_number" value="{{ old('rooms_number') }}" class="form-control @error('rooms_number') is-invalid @enderror" id="rooms-number">
            @error('rooms_number')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Выберите категорию</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Выберите изображения</label>
            <input class="form-control @error('images') is-invalid @enderror" type="file" id="images" name="images[]" multiple>
            @error('images[]')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success">Добавить</button>
    </form>
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-primary mt-3">Назад</a>
@endsection
