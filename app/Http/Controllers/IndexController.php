<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(9);
        $classes = ['isosceles-triangles', 'right-triangles', 'circle-square'];
        return view('index', compact('rooms', 'classes'));
    }

    public function dashboard()
    {
        $users = User::count();
        $employees = Employee::count();
        $orders = Order::count();
        return view('admin.index', compact('users', 'employees', 'orders'));
    }

    public function profile()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('user.profile.index', compact('orders'));
    }
}
