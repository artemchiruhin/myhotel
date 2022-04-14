<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Полный отчет</title>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th>Номер</th>
        <th>Клиент</th>
        <th>Дата начала</th>
        <th>Дата окончания</th>
        <th>Стоимость</th>
        <th>Дата броинрования</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->room->number }}</td>
            <td>{{ $order->user->full_name }}</td>
            <td>{{ date('d.m.Y', strtotime($order->date_from)) }}</td>
            <td>{{ date('d.m.Y', strtotime($order->date_to)) }}</td>
            <td>{{ $order->cost }} руб.</td>
            <td>{{ date('d.m.Y', strtotime($order->created_at)) }}</td>
            <td>{{ $order->status ?? 'Не подтверждено' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
