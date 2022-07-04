# :hotel: Веб-приложение для отеля

Проект был создан во время производственной практики. Имеется разделение прав пользователя и администратора. Администратор может управлять всей информацией (CRUD). Все маршруты администратора защищены от пользователя с помощью middleware. Пользователь может бронировать номера. Забронировать можно только свободный номер.

Использованные технологии: **Laravel** и **Livewire**

Все модули проекта распределены по своим директориям. Названия файлов отражают их суть. При наименовании чего-либо придерживался ресурсного стиля, принятого в Laravel.

База данных была создана с помощью миграций.

При создании столкнулся с трудностью изменения информации о номере, так как у каждого номера несколько изображений, но проблема была решена с помощью Livewire.

## :cinema: Демонстрация проекта:

Главная, регистрация, авторизация

![Demo](https://media.giphy.com/media/sDY2qdYvRCLSEnq18r/giphy.gif)

Панель администратора

![Demo](https://media.giphy.com/media/mBLXio5znthvPt4XOW/giphy.gif)

Функционал пользователя

![Demo](https://media.giphy.com/media/f0ILCO1Zq1o6HwWAJU/giphy.gif)
