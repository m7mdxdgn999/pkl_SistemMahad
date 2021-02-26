<?php

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


//login
Route::get('/', 'authentication\AuthenticationController@Index')->name('p.login');
Route::post('/login', 'authentication\AuthenticationController@Login')->name('login');


Route::group(['middleware' => 'CekLoginMiddleware'], function () {
    //crud mhs
    Route::get('crud', 'StudentsController@Index')->name('index');
    Route::get('crud/create', 'StudentsController@Create')->name('c.mhs');
    Route::post('crud/store', 'StudentsController@Store')->name('store.mhs');
    Route::delete('crud/delete/{student}', 'StudentsController@Destroy')->name('destroy.mhs');
    Route::get('crud/edit/{student}', 'StudentsController@Edit')->name('edit.mhs');
    Route::put('crud/{student}', 'StudentsController@Update')->name('u.mhs');
    Route::get('/logout', 'authentication\AuthenticationController@Logout')->name('logout');
});
