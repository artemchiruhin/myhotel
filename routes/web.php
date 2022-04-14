<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['as'=>'auth.', 'middleware' => 'guest'], function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::group(['as' => 'user.', 'middleware' => 'auth', 'prefix' => 'user'], function() {
    Route::get('/profile', [IndexController::class, 'profile'])->name('profile');
});

Route::group(['as' => 'rooms.', 'prefix' => 'rooms'], function() {
    Route::get('/{room}', [\App\Http\Controllers\User\RoomController::class, 'show'])->name('show');
    Route::post('/{room}/booking', [\App\Http\Controllers\User\RoomController::class, 'booking'])->middleware('auth')->name('booking');
});

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
    Route::get('/', [IndexController::class, 'dashboard'])->name('index');

    Route::group(['as' => 'categories.', 'prefix' => 'categories'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}/edit', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'roles.', 'prefix' => 'roles'], function() {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/create', [RoleController::class, 'store']);
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::put('/{role}/edit', [RoleController::class, 'update']);
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'positions.', 'prefix' => 'positions'], function() {
        Route::get('/', [PositionController::class, 'index'])->name('index');
        Route::get('/create', [PositionController::class, 'create'])->name('create');
        Route::post('/create', [PositionController::class, 'store']);
        Route::get('/{position}/edit', [PositionController::class, 'edit'])->name('edit');
        Route::put('/{position}/edit', [PositionController::class, 'update']);
        Route::delete('/{position}', [PositionController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'rooms.', 'prefix' => 'rooms'], function() {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::post('/create', [RoomController::class, 'store']);
        Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
        Route::put('/{room}/edit', [RoomController::class, 'update']);
        Route::delete('/{room}', [RoomController::class, 'destroy'])->name('destroy');
        Route::get('/{room}/cleaning-schedule', [RoomController::class, 'cleaningSchedule'])->name('cleaning-schedule');
    });

    Route::group(['as' => 'employees.', 'prefix' => 'employees'], function() {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::group(['as' => 'tasks.'], function() {
            Route::get('/{employee}/tasks', [EmployeeController::class, 'tasks'])->name('index');
            Route::get('/{employee}/tasks/create', [EmployeeController::class, 'createTask'])->name('create');
            Route::post('/{employee}/tasks/create', [EmployeeController::class, 'storeTask']);
            Route::get('/{employee}/tasks/{task}/edit', [EmployeeController::class, 'editTask'])->name('edit');
            Route::put('/{employee}/tasks/{task}/edit', [EmployeeController::class, 'updateTask']);
            Route::delete('/{employee}/tasks/{task}', [EmployeeController::class, 'destroyTask'])->name('destroy');
        });
        Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'orders.', 'prefix' => 'orders'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::put('/{order}/confirm', [OrderController::class, 'confirm'])->name('confirm');
        Route::post('/report', [OrderController::class, 'report'])->name('report');
    });
});
