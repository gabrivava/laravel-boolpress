<?php

use App\Post;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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


/* 1^ OPZIONE rotta contact */
/* Route::get('/contact', function()
{
   return view('admin.contact');
})->name('contact');
Route::post('contact', function(Request $request)
{
    # validazione dati
    $validateData = $request->validate([
        'full_name' => 'required | min: 3 | max: 100',
        'email' => 'required | email',
        'message' => 'required | min: 3'
    ]);

    # visualizzazione mail anteprima
    // return (new ContactFormMail($validateData))->render();

    # invio della mail
    Mail::to('franco@example.it')
    ->send(new ContactFormMail($validateData));
    return redirect()
    ->back()
    ->with('message','email inviata con successo');


})->name('contact.send'); */
/* / */

/* 2^ OPZIONE */
Route::get('contact', 'ContactController@form')->name('contact');
Route::post('contact', 'ContactController@send')->name('contact.send');


Auth::routes();

Route::get('vue-posts', function() {
    return view('posts');
});

/* admin rotte */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
});

/* categories table */
