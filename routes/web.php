<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;

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
    return view('dashboard');
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

Route::view(
    '/daftar-makanan',
    'daftar-makanan'
);

Route::get('/profile', function () {
    $user = User::latest()->first();

    return view('profile', compact('user'));
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/history-like', function () {
    return view('history-like');
});

Route::view(
    '/spinner',
    'spinner'
);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');