<div>
    <div class="search-container">
        <form action="">
            <div class="input-group">
                <span class="input-group-text text-red" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" placeholder="Поиск..." wire:model="term">
            </div>
        </form>
    </div>
    @if(count($employees) > 0)
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Должность</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th>{{ $employee->id }}</th>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->position->name }}</td>
                <td class="action-buttons-cell">
                    <div class="action-buttons">
                        <a href="{{ route('admin.employees.tasks.index', $employee) }}" class="btn btn-primary">Задания</a>
                        <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" class="form-delete">
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
    {{ $employees->links() }}
    @else
        <h3 class="text-center">Сотрудников пока нет.</h3>
    @endif

    @include('includes.modal')
</div>
