<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

use App\Models\Transaction;
use App\Models\User;


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
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});


// Route::get('/userCreate', function () {
//     return view('dashboard.users.create');
// });

Auth::routes();

Route::resource('/transaction', TransactionController::class);
Route::resource('/user', UserController::class);

Route::get('/userhavetransaction/{id}', [App\Http\Controllers\UserController::class, 'userhavetransaction'])->name('userhavetransaction');

Route::post('/firstPage', [App\Http\Controllers\UserController::class, 'firstPage'])->name('firstPage');
Route::get('/secondPage', [App\Http\Controllers\TransactionController::class, 'secondPage'])->name('secondPage');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/chart/{id}', [App\Http\Controllers\UserController::class, 'chart'])->name('chart');
