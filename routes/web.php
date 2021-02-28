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
Route::post('/login', 'authentication\AuthenticationController@Login')->name('login');
Route::get('/', 'authentication\AuthenticationController@Index')->name('p.login');


Route::group(['prefix' => 'student','middleware' => 'auth'], function () {
    //crud mhs
    Route::get('/', 'StudentsController@Index')->name('student.index');
    Route::get('create', 'StudentsController@Create')->name('student.create');
    Route::post('store', 'StudentsController@Store')->name('student.store');
    Route::get('show/{student}', 'StudentsController@Show')->name('student.show');
    Route::get('edit/{student}', 'StudentsController@Edit')->name('student.edit');
    Route::put('update/{student}', 'StudentsController@Update')->name('student.update');
    Route::delete('delete/{student}', 'StudentsController@Destroy')->name('student.destroy');
    Route::get('/logout', 'authentication\AuthenticationController@Logout')->name('logout');
});
