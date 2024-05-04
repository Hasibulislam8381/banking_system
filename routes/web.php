<?php


use Illuminate\Support\Facades\Route;
// use  App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/user', 'App\Http\Controllers\Auth\RegisterController@register');

Route::get('/show',[\App\Http\Controllers\TransactionController::class, 'index'])->name('show');
Route::post('/deposite',[\App\Http\Controllers\TransactionController::class, 'deposite'])->name('deposite.store');
Route::get('/deposite',[\App\Http\Controllers\TransactionController::class, 'get_deposite'])->name('deposite.view');
Route::get('/createDeposite',[\App\Http\Controllers\TransactionController::class, 'createDeposite'])->name('createDeposite');
Route::get('/createWithdraw',[\App\Http\Controllers\TransactionController::class, 'createWithdraw'])->name('createWithdraw');
Route::post('/withdraw',[\App\Http\Controllers\TransactionController::class, 'withdraw'])->name('withdraw.store');
Route::get('/withdraw',[\App\Http\Controllers\TransactionController::class, 'view_withdraw'])->name('withdraw.view');