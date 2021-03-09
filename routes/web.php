<?php

use App\Http\Controllers\FrontEndController;
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
Route::get('/', 'FrontEndController@home')->name('website');

Route::get('/about', 'FrontEndController@about')->name('website.about');

Route::get('/category', 'FrontEndController@category')->name('website.category');

Route::get('/contact', 'FrontEndController@contact')->name('website.contact');

Route::get('/tag', 'FrontEndController@tag')->name('website.tag');

Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');


// Admin panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function() {
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
});

