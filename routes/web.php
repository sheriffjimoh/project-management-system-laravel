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



Route::group(['middleware'=>'web'], function () {
 Route::resource('companies','CompaniesController');
Route::resource('projects' ,'ProjectsController');
Route::resource('roles' ,'RolesController');
Route::resource('tasks' ,'TasksController');
Route::resource('users' ,'UsersController');
Route::resource('comments' ,'CommentsController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
});


Route::get('/', function () {
    return view('/index');
});
