<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MarketController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ReferralsController;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('')->group(function () {
    Route::get('/', function () { 
        return view('home');
    })->name('/');

    Route::get('/about', function () {
        return view('footer.about');
    })->name('about');

    Route::get('/help', function () {
        return view('footer.help');
    })->name('help');

    Route::get('/faq', function () {
        return view('footer.faq');
    })->name('faq');

    Route::get('/privacy', function () {
        return view('footer.privacy');
    })->name('privacy');

    Route::get('/term', function () {
        return view('footer.term');
    })->name('term');

    Route::get('/disclaimer', function () {
        return view('footer.disclaimer');
    })->name('disclaimer');
});

Route::middleware('guest')->group(function () {
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', 'get')->name('register');
        Route::post('/register', 'store')->name('store');
    });

    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('store');
    });

    Route::controller(PasswordResetLinkController::class)->group(function () {
        Route::get('/forgot-password', 'create')->name('password.request');
        Route::post('/forgot-password', 'store')->name('password.email');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::post('/logout', 'destroy')->name('logout');
    });

    Route::controller(GameController::class)->group(function () {
        Route::get('/game', 'get')->name('game');
        Route::post('/travel', 'travel')->name('travel');
    });

    Route::controller(EnergyController::class)->group(function () {
        Route::get('/energy', 'get')->name('energy');
        Route::post('/collect', 'collect')->name('collect');
    });

    Route::controller(PointsController::class)->group(function () {
        Route::get('/points', 'get')->name('points');
    });

    Route::controller(TaskController::class)->group(function () {
        Route::get('/task', 'get')->name('task');
    });

    Route::controller(StoreController::class)->group(function () {
        Route::get('/store', 'get')->name('store');
    });

    Route::controller(MarketController::class)->group(function () {
        Route::get('/market', 'get')->name('market');
    });

    Route::controller(LeaderboardController::class)->group(function () {
        Route::get('/leaderboard', 'get')->name('leaderboard');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'get')->name('profile');
        Route::put('/wallet', 'update')->name('wallet.update');
    });

    Route::controller(PasswordController::class)->group(function () {
        Route::put('/password', 'update')->name('password.update');
    });

    Route::controller(ReferralsController::class)->group(function () {
        Route::get('/referrals', 'get')->name('referrals');
    });

    Route::controller(FinanceController::class)->group(function () {
        Route::get('/finance', 'get')->name('finance');
    });
});

require __DIR__.'/auth.php';