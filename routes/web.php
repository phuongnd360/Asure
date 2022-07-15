<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-user', [App\Http\Controllers\HomeController::class, 'addUser'])->name('addUser');
Route::post('/add-user', [App\Http\Controllers\HomeController::class, 'saveAddUser'])->name('saveAddUser');
Route::get('/del-user/{id}', [App\Http\Controllers\HomeController::class, 'delUser'])->name('delUser');

Route::get('/user-detail/{id}', [App\Http\Controllers\HomeController::class, 'showUser'])->name('showUser');
