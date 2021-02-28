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
Route::post('/login', 'authentication\AuthenticationController@Login')->name('loginAction');
Route::get('/', 'authentication\AuthenticationController@Index')->name('loginForm');
Route::get('/logout', 'authentication\AuthenticationController@Logout')->name('logout');
Route::get('404', 'authentication\AuthenticationController@Page404')->name('404');

//registration
// 


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::group(['prefix' => 'student'], function () {

        //crud mhs
        Route::get('/', 'Admin\StudentController@Index')->name('admin.student.index');
        Route::get('create', 'Admin\StudentController@Create')->name('student.create');
        Route::post('store', 'Admin\StudentController@Store')->name('student.store');
        Route::get('show/{student}', 'Admin\StudentController@Show')->name('student.show');
        Route::get('edit/{student}', 'Admin\StudentController@Edit')->name('student.edit');
        Route::put('update/{student}', 'Admin\StudentController@Update')->name('student.update');
        Route::delete('delete/{student}', 'Admin\StudentController@Destroy')->name('student.destroy');
        
    });

});

Route::group(['prefix' => 'student','middleware' => ['auth', 'student']], function () {
    //crud mhs
    Route::get('/', 'Student\StudentController@Index')->name('student.index');

});


