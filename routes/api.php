<?php

use App\Category;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


# struttura personalizzata customizzabile
/* Route::get('posts', function () {
    $posts = Post::all();

    return response()->json([
        'response' => $posts
    ]);
}); */

# struttura prefabbricata non customizzabile
// quando restituiamo una collection un entità mi retituisce un json
/* Route::get('posts', function () {
    $posts = Post::paginate();

    return $posts;
}); */

# struttura per vedere dati delle relazioni
/* Route::get('posts', function () {
    $posts = Post::with(['category', 'tags'])->paginate();

    return $posts;
}); */

# con controller
Route::get('posts', 'API\PostController@index');

Route::get('posts/{post}', function(Post $post) {
    return new PostResource($post);
});

Route::get('categories', function()
{
    return Category::all();
});
