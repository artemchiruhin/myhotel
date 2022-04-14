<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrdersReport;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function confirm(Request $request, Order $order)
    {
        $order->status = 'Подтверждено';
        $order->save();

        return redirect(route('admin.orders.index'))->with([
            'orderConfirmed' => 'Броинрование подтверждено'
        ]);
    }

    public function report()
    {
        $orders = Order::all();
        if(count($orders) > 0) {
            //Mail::to(auth()->user()->email)->send(new OrdersReport($orders));
            return redirect(route('admin.orders.index'))->with('reportSent', 'Отчет был отправлен вам на почту');
        }
        return redirect(route('admin.orders.index'))->with('reportNotSent', 'Отчет не был отправлен, так как бронирований нет.');
    }
}
