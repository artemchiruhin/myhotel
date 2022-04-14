@component('mail::message')
# Номер {{ $order->room->number }} был забронирован

Информация о бронировании:

- Клиент: {{ $order->user->full_name }}
- Стоимость: {{ $order->cost }} руб.
- Дата начала: {{ $order->date_from }}
- Дата окончания: {{ $order->date_to }}

@component('mail::button', ['url' => route('admin.orders.index')])
В панель администратора
@endcomponent

С любовью,<br>
{{ config('app.name') }}
@endcomponent
