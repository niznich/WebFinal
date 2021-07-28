<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

//retrive data

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

});

// for student
Route::group(['middleware' => ['auth', 'role:student']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/learn', 'App\Http\Controllers\DashboardController@learn')->name('dashboard.learn');
    Route::get('/dashboard/quiz', 'App\Http\Controllers\DashboardController@quiz')->name('dashboard.quiz');
    Route::get('/dashboard/contactteach', 'App\Http\Controllers\ContactController@index')->name('dashboard.contactteach');
    
    Route::get('/dashboard/mquiz', 'App\Http\Controllers\DashboardController@mquiz')->name('dashboard.mquiz');
    Route::get('/dashboard/squiz', 'App\Http\Controllers\DashboardController@squiz')->name('dashboard.squiz');
    Route::get('/dashboard/hquiz', 'App\Http\Controllers\DashboardController@hquiz')->name('dashboard.hquiz');
    Route::get('/dashboard/gquiz', 'App\Http\Controllers\DashboardController@gquiz')->name('dashboard.gquiz');

    Route::get('/dashboard/mlearn', 'App\Http\Controllers\DashboardController@mlearn')->name('dashboard.mlearn');
    Route::get('/dashboard/slearn', 'App\Http\Controllers\DashboardController@mlearn')->name('dashboard.slearn');
    Route::get('/dashboard/hlearn', 'App\Http\Controllers\DashboardController@hlearn')->name('dashboard.hlearn');
    Route::get('/dashboard/glearn', 'App\Http\Controllers\DashboardController@glearn')->name('dashboard.glearn');



});



require __DIR__.'/auth.php';


