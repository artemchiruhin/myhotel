<div>
    @if(count($rooms) > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span>ID</span>
                        <i class="fa-solid fa-sort filter-icon" wire:click="sortBy('id')"></i>
                    </div>
                </th>
                <th>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span>Номер</span>
                        <i class="fa-solid fa-sort filter-icon" wire:click="sortBy('number')"></i>
                    </div>
                </th>
                <th>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span>Этаж</span>
                        <i class="fa-solid fa-sort filter-icon" wire:click="sortBy('floor')"></i>
                    </div>
                </th>
                <th>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span>Цена за сутки</span>
                        <i class="fa-solid fa-sort filter-icon" wire:click="sortBy('price_per_day')"></i>
                    </div>
                </th>
                <th>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <span>Кол-во комнат</span>
                        <i class="fa-solid fa-sort filter-icon" wire:click="sortBy('rooms_number')"></i>
                    </div>
                </th>
                <th>Категория</th>
                <th>Фотографии</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <th>{{ $room->id }}</th>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->price_per_day }} руб.</td>
                    <td>{{ $room->rooms_number }}</td>
                    <td>{{ $room->category->name }}</td>
                    <td>@foreach(json_decode($room->images) as $image) <img src="{{ get_image_path($image) }}" style="width: 100px" />@endforeach</td>
                    <td class="action-buttons-cell">
                        <div class="action-buttons">
                            <a href="{{ route('admin.rooms.cleaning-schedule', $room) }}" class="btn btn-warning">График уборки</a>
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary">Изменить</a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="form-delete">
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
        {{ $rooms->links() }}
    @else
        <h3 class="text-center">Номеров пока нет.</h3>
    @endif

    @include('includes.modal')
</div>
