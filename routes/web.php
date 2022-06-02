<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\role;
use App\Http\Livewire\ExpenseCategory;
use App\Http\Livewire\Expenses;
use App\Http\Livewire\Users;
use App\Http\Livewire\Dashboard;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/role', role::class)
->name('role');
Route::middleware(['auth:sanctum', 'verified'])->get('/expensecategory', ExpenseCategory::class)
->name('expensecategory');
Route::middleware(['auth:sanctum', 'verified'])->get('/Expenses', Expenses::class)
->name('Expenses');
Route::middleware(['auth:sanctum', 'verified'])->get('/user', Users::class)
->name('user');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)
->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
