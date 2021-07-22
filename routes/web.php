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


//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for student
Route::group(['middleware' => ['auth', 'role:student']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/study', 'App\Http\Controllers\DashboardController@study')->name('dashboard.study');
    Route::get('/dashboard/learn', 'App\Http\Controllers\DashboardController@learn')->name('dashboard.learn');
    Route::get('/dashboard/quiz', 'App\Http\Controllers\DashboardController@quiz')->name('dashboard.quiz');
    Route::get('/dashboard/contactteach', 'App\Http\Controllers\DashboardController@contactteach')->name('dashboard.contactteach');

});



// for teachers 
Route::group(['middleware' => ['auth', 'role:teacher']], function() { 
    Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
});

require __DIR__.'/auth.php';


