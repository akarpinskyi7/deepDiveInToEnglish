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


Route::get('/', 'FrontController@index')->name('/');
Route::resource('course', 'CourseController');
Route::resource('feedback', 'FeedbackController');
//Route::get('client/', 'ClientController@store')->name('client.store');
//Route::get('/client/client', 'ClientController@index')->name('client.index');
//Route::get('/client/client/edit/{id}', 'ClientController@edit')->name('client.edit');
//Route::patch('/client/client/edit/{id}', 'ClientController@update')->name('client.update');
//Route::delete('/client/client/{id}', 'ClientController@destroy')->name('client.destroy');
//Route::post('/', 'ClientController@store')->name('client.store');


//Auth::routes();

Route::resource('client', 'ClientController');
//Route::get('post/', 'PostController@index')->name('post.index');
//Route::post('post/', 'PostController@store')->name('post.store');
//Route::get('post/create', 'PostController@create')->name('post.create');
//Route::get('post/show/{id}', 'PostController@show')->name('post.show');
//Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
//Route::patch('post/show/{id}', 'PostController@update')->name('post.update');
//Route::delete('post/{id}', 'PostController@destroy')->name('post.destroy');

Route::get('image-gallery', 'ImageGalleryController@index')->name('image-gallery');
Route::post('image-gallery', 'ImageGalleryController@store')->name('image-gallery.store');
Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy')->name('image-gallery.destroy');

Route::post('image-gallery/upload', 'ImageGalleryController@upload')->name('image-gallery.upload');


//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false,'verify' => true]);


