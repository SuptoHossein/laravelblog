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

// Auth Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Frontend Routes
Route::get('/', function() {
    return view('website.home');
})->name('website');
Route::get('/about', function() {
    return view('website.about');
});
Route::get('/category', function() {
    return view('website.category');
});
Route::get('/contact', function() {
    return view('website.contact');
});
Route::get('/post', function() {
    return view('website.post');
});
Route::get('/tag', function() {
    return view('website.tag');
});


// Admin panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function() {
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
});

