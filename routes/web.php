<?php

use App\Post;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*  rotte utenti guest */
Route::get('/', function () {
    $posts = Post::all();
    return view('guest.welcome', compact('posts'));
})->name('home');
Route::resource('posts', 'PostController')->only('index', 'show');

Auth::routes();

/* admin rotte */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', 'PostController');
});
