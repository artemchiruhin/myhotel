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

## :twisted_rightwards_arrows: Созданные маршруты

| № | Путь | Название | Http метод | Middleware | Контроллер, метод |
| --- | --- | --- | --- | --- | --- |
| 1 | / | index | GET | x | IndexController, index |
| 2 | /register | auth.register | GET | guest | RegisterController, index |
| 3 | /register | auth.register | POST | guest | RegisterController, store |
| 4 | /login | auth.login | GET | guest | LoginController, index |
| 5 | /login | auth.login | POST | guest | LoginController, store |
| 6 | /logout | auth.logout | POST | auth | LoginController, logout |
| 7 | /user/profile | user.profile | GET | auth | IndexController, profile |
| 8 | /rooms/{room} | rooms.show | GET | x | User\RoomController, show |
| 9 | /rooms/{room}/booking | rooms.booking | POST | x | User\RoomController, booking |
| 10 | /admin | admin.index | GET | auth, admin | IndexController, dashboard |
| 11 | /admin/categories | admin.categories.index | GET | auth, admin | CategoryController, index |
| 12 | /admin/categories/create | admin.categories.create | GET | auth, admin | CategoryController, create |
| 13 | /admin/categories/create | admin.categories.create | POST | auth, admin | CategoryController, store |
| 14 | /admin/categories/{category}/edit | admin.categories.edit | GET | auth, admin | CategoryController, edit |
| 15 | /admin/categories/{category}/edit | admin.categories.edit | PUT | auth, admin | CategoryController, update |
| 16 | /admin/categories/{category} | admin.categories.destroy | DELETE | auth, admin | CategoryController, destroy |
| Маршруты | для ролей, | должностей, | сотрудников | и комнат | аналогичны |
| 17 | /admin/orders/{order}/confirm | admin.orders.confirm | PUT | auth, admin | OrderController, confirm |
| 18 | /admin/orders/report | admin.orders.report | POST | auth, admin | OrderController, report |

## :deciduous_tree: Структура функциональной части проекта проекта

Что создано мной и **важно** показать. Как видите, всё распределено по своим разделам.
```
.
├── app
|   ├── Http
|   |   ├── Controllers
|   |   |   ├── Admin
|   |   |   |   ├── CategoryController.php
|   |   |   |   ├── EmployeeController.php
|   |   |   |   ├── OrderController.php
|   |   |   |   ├── PositionController.php
|   |   |   |   ├── RoleController.php
|   |   |   |   └── RoomController.php
|   |   |   ├── Auth
|   |   |   |   ├── RegisterController.php
|   |   |   |   └── LoginController.php
|   |   |   ├── User
|   |   |   |   └── RoomController.php
|   |   |   └── IndexController.php
|   |   ├── Livewire
|   |   |   ├── Admin
|   |   |   |   ├── Tasks
|   |   |   |   |   ├── CreateTask.php
|   |   |   |   |   └── EditTask.php
|   |   |   |   ├── EditRoomForm.php
|   |   |   |   ├── EmployeesList.php
|   |   |   |   └── RoomsList.php
|   |   |   └── User
|   |   |       └── Room.php
|   |   ├── Middleware
|   |   |   └── IsAdmin.php
|   |   └── Requests
|   |   |   ├── BookingFormRequest.php
|   |   |   ├── CategoryFormRequest.php
|   |   |   ├── CreateTaskFormRequest.php
|   |   |   ├── EditEmployeeRequest.php
|   |   |   ├── LoginFormRequest.php
|   |   |   ├── PositionFormRequest.php
|   |   |   ├── RegisterFormRequest.php
|   |   |   ├── RoleFormRequest.php
|   |   |   ├── RoomCreateFormRequest.php
|   |   |   └── RoomEditFormRequest.php
|   ├── Mail
|   |   ├── OrdersReport.php
|   |   ├── RoomBooking.php
|   |   └── UserRegistered.php
|   ├── Models
|   |   ├── Category.php
|   |   ├── Employee.php
|   |   ├── Order.php
|   |   ├── Position.php
|   |   ├── Role.php
|   |   ├── Room.php
|   |   ├── Task.php
|   |   └── User.php
|   └── helpers.php
```
