<?php

// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\RegisteredUserController;
// use Illuminate\Support\Facades\Route;

// Route::middleware('guest')->group(function () {

//     Route::get('/', function () { 
//         return view('welcome');
//     })->name('/');

//     Route::get('register', [RegisteredUserController::class, 'create'])
//                 ->name('register');

//     Route::post('register', [RegisteredUserController::class, 'store']);

//     Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');

//     Route::post('login', [AuthenticatedSessionController::class, 'store']);

//     Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->name('password.request');

//     Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//                 ->name('password.email');

// });