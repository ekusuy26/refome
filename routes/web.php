<?php

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

Route::get('/', 'Auth\FoodController@showTopPage')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/foods/new', 'Auth\FoodController@index')->name('foods.new');
Route::post('/foods/new', 'Auth\FoodController@foodArticle')->name('foods.new.posts');

Route::get('/foods/delete', 'Auth\FoodController@delete')->name('foods.delete');
Route::post('/foods/delete', 'Auth\FoodController@foodDelete')->name('foods.delete.posts');