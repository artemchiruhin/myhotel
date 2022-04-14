<form action="{{ route('admin.employees.tasks.create', $employee) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="activity">Выберите деятельность</label>
        <select wire:model="activity" class="form-select @error('main_text') is-invalid @enderror @error('choose_activity') is-invalid @enderror" id="activity" name="main_text">
            <option>-- Выберите деятельность --</option>
            @foreach($activities as $item)
                <option value="{{ $item['activity'] }}">{{ $item['activity'] }}</option>
            @endforeach
        </select>
        @error('main_text')
        <span class="invalid-feedback fade-in-left">{{ $message }}</span>
        @enderror
        @error('choose_activity')
        <span class="invalid-feedback fade-in-left">{{ $message }}</span>
        @enderror
    </div>
    @if(count($numbers) > 0)
        <div class="mb-3">
            <label for="number">Выберите номер</label>
            <select class="form-select @error('number') is-invalid @enderror" id="number" name="sub_text">
                @foreach($numbers as $number)
                    <option value="{{ $number->number }}">{{ $number->number }}</option>
                @endforeach
            </select>
            @error('number')
            <span class="invalid-feedback fade-in-left">{{ $message }}</span>
            @enderror
        </div>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="number">Выберите дату и время начала</label>
                <div class="mb-3">
                    <input type="date" class="form-control @error('date_from') is-invalid @enderror @error('employee_busy') is-invalid @enderror" value="{{ old('date_from') }}" name="date_from" min="{{ date("Y-m-d", strtotime('today')) }}">
                    @error('date_from')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="time" class="form-control @error('time_from') is-invalid @enderror @error('incorrect_time') is-invalid @enderror @error('employee_busy') is-invalid @enderror" value="{{ old('time_from') }}" name="time_from">
                    @error('time_from')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                    @error('incorrect_time')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="number">Выберите дату и время окончания</label>
                <div class="mb-3">
                    <input type="date" class="form-control @error('date_to') is-invalid @enderror @error('employee_busy') is-invalid @enderror" value="{{ old('date_to') }}" name="date_to" min="{{ date("Y-m-d", strtotime('today')) }}">
                    @error('date_to')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="time" class="form-control @error('time_to') is-invalid @enderror @error('incorrect_time') is-invalid @enderror @error('employee_busy') is-invalid @enderror" value="{{ old('time_to') }}" name="time_to">
                    @error('time_to')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                    @error('incorrect_time')
                    <p class="invalid-feedback fade-in-left">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @error('employee_busy')
    <p class="text-danger fade-in-left">{{ $message }}</p>
    @enderror
    <button class="btn btn-red">Сохранить</button>
</form>
