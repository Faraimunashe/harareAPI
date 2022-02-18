<?php

use App\Models\Accounts;
use App\Models\Logs;
use App\Models\Paynowlog;
use App\Models\User;
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
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    $cusers = User::all()->count();
    $caccounts = Accounts::all()->count();
    $clogs = Logs::all()->count();
    $cpaynow = Paynowlog::all()->count();

    return view('dashboard', [
        'users' => $cusers,
        'accounts' => $caccounts,
        'logs' => $clogs,
        'paynow' => $cpaynow
    ]);
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/accounts', 'App\Http\Controllers\AccountsController@index')->name('accounts');
    Route::get('/admin/users', 'App\Http\Controllers\AccountsController@user')->name('users');
    Route::get('/admin/edit/{id}', 'App\Http\Controllers\AccountsController@editview')->name('edit-account');
    Route::get('/admin/delete/{id}', 'App\Http\Controllers\AccountsController@delete')->name('delete-account');
    Route::get('/admin/add/accounts', 'App\Http\Controllers\AccountsController@add')->name('add-account');
    Route::post('/admin/post/acc', 'App\Http\Controllers\AccountsController@post')->name('post-account');
    Route::post('/admin/post/edit', 'App\Http\Controllers\AccountsController@edit')->name('post-edit-account');

    Route::get('/admin/transactions', 'App\Http\Controllers\TransactionsController@index')->name('transactions');
});

require __DIR__ . '/auth.php';
