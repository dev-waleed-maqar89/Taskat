<?php

use App\Livewire\Auth\UserLogin;
use App\Livewire\Auth\UserRegister;
use App\Livewire\HomePage;
use App\Livewire\Task\TaskManager;
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

Route::get('/', TaskManager::class)->name('homePage')->middleware('auth');
Route::get('/register', UserRegister::class)->name('register')->middleware('guest');
Route::get('/login', UserLogin::class)->name('login')->middleware('guest');
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout')->middleware('auth');