@component('mail::message')
# Зарегистрировался новый пользователь

Его данные:
- ФИО: {{ $user->full_name }}
- Email: {{ $user->email }}
- Телефон: {{ $user->phone }}

С любовью,<br>
{{ config('app.name') }}
@endcomponent
