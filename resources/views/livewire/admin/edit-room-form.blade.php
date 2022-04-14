<div>
    <form method="POST" action="{{ route('admin.rooms.edit', $room) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @error('formError')
        <div class="danger alert-danger p-2 mb-2 fade-in-left">
            <i class="fas fa-times-circle"></i>
            {{ $message }}
        </div>
        @enderror
        <div class="mb-3">
            <label for="number" class="form-label">Введите номер</label>
            <input type="number" name="number" value="{{ $room->number }}" class="form-control @error('number') is-invalid @enderror" id="number">
            @error('number')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price-per-day" class="form-label">Введите цену за сутки</label>
            <input type="number" name="price_per_day" value="{{ $room->price_per_day }}" class="form-control @error('price_per_day') is-invalid @enderror" id="price-per-day">
            @error('price_per_day')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms-number" class="form-label">Введите кол-во комнат</label>
            <input type="number" name="rooms_number" value="{{ $room->rooms_number }}" class="form-control @error('rooms_number') is-invalid @enderror" id="rooms-number">
            @error('rooms_number')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Выберите категорию</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $room->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <p>Имеющиеся изображения:</p>
        <div class="mb-3 room-photos">
            @foreach($images as $i => $image)
                <div class="room-photo-block">
                    <img src="{{ get_image_path($image) }}" style="width: 100px" />
                    <span class="badge" wire:click="removeImage({{ $i }})" wire:key="{{ $i }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>
                </div>
            @endforeach
                <input type="hidden" name="removedImages" value="{{ json_encode($removedImages) }}">
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Выберите изображения</label>
            <input class="form-control @error('images[]') is-invalid @enderror @error('no_images') is-invalid @enderror" type="file" id="images" name="images[]" multiple>
            @error('images[]')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
            @error('no_images')
            <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Изменить</button>
    </form>
</div>
