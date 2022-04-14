<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingFormRequest;
use App\Mail\RoomBooking;
use App\Mail\UserRegistered;
use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{
    public function show(Room $room)
    {
        return view('user.rooms.show', compact('room'));
    }

    public function booking(BookingFormRequest $request, Room $room)
    {
        $request->validated();

        $orders = Order::where('room_id', $room->id)->where('date_to', '>', date('Y-m-d'))->get();

        foreach ($orders as $order) {
            if ($request->date_from > $order->date_from && $request->date_from < $order->date_to
                || $request->date_to > $order->date_from && $request->date_to < $order->date_to
                || $request->date_from < $order->date_from && $request->date_to > $order->date_to) {
                return redirect()->back()->withErrors(['date_exists' => 'В выбранные даты номер занят.'])->withInput();
            }
        }

        $days = date_diff(date_create($request->date_to), date_create($request->date_from))->days;
        $cost = $days * $room->price_per_day;

        $order = Order::create([
            'room_id' => $room->id,
            'user_id' => auth()->id(),
            'cost' => $cost,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to
        ]);

        //Mail::to(env('MAIL_USERNAME'))->send(new RoomBooking($order));

        return redirect(route('index'));
    }
}
