<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterFormRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        auth()->login($user);

        //Mail::to(env('MAIL_USERNAME'))->send(new UserRegistered($user));

        return redirect(route('index'));
    }
}
