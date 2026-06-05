<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    $foods = Food::all();
    return view('dashboard', compact('foods'));
});

Route::get('/preferences', function () {
    return view('preferences');
});

Route::get('/admin/foods/create', function () {
    return view('admin.food-create');
});

Route::view(
    '/admin/foods/create',
    'admin.food-create'
);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');