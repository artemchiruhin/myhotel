<div class="room">
    <div class="swiper">
        <div class="room-images swiper-wrapper">
            @foreach(json_decode($room->images) as $image)
                <div class="room-images__image swiper-slide">
                    <img src="{{ get_image_path($image) }}">
                </div>
            @endforeach
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <div class="room-info">
        <h1 class="text-red">Номер {{ $room->number }}</h1>
        <p>Этаж: {{ $room->floor }}</p>
        <p>Количество комнат: {{ $room->rooms_number }}</p>
        <p>Категория: {{ $room->category->name }}</p>
        <p>Цена за сутки: <strong class="text-red"><span class="price-per-day">{{ $room->price_per_day }}</span> руб.</strong></p>
    </div>
    <div class="room-booking">
        <h3 class="text-red mt-5">Забронировать</h3>
        <form action="{{ route('rooms.booking', $room) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md col-12">
                    <label for="date-from" class="form-label">Начальная дата: </label>
                    <input type="date" wire:model="date_from" class="form-control @error('date_from') is-invalid @enderror" value="{{ old('date_from') }}" name="date_from" id="date-from" min="{{ date("Y-m-d", strtotime('tomorrow')) }}">
                    @error('date_from')
                    <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md col-12">
                    <label for="date-to" class="form-label">Конечная дата: </label>
                    <input type="date" wire:model="date_to" class="form-control @error('date_to') is-invalid @enderror" value="{{ old('date_to') }}" name="date_to" id="date-to" min="{{ date("Y-m-d", strtotime('tomorrow')) }}">
                    @error('date_to')
                    <span class="invalid-feedback fade-in-left" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                @if($errors->first('date_exists'))
                    <span class="text-danger fade-in-left" role="alert">{{ $errors->first('date_exists') }}</span>
                @endif
            </div>
            <div class="mt-3">
                <h5 class="text-red">Стоимость: <span class="cost">{{ $cost }}</span> руб.</h5>
            </div>
            <div class="mt-3">
                <button class="btn btn-red">Арендовать</button>
            </div>
        </form>
    </div>
</div>
