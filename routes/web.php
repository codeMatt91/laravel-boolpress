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


Auth::routes();

// Qui sto creando le rotte Admin protette dal Middleware auth
Route::middleware('auth')->prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    // Qui gestisco la rotta per vedere i post di una specifica categoria
    Route::get('/posts/{category}', 'PostController@category')->name('posts.category');
    Route::resource('posts', 'PostController');
    //In questa rotta faccio si che se scrivo sull-url 'admin/qualsiasi cosa' mi manda in 404 e non su Vue
    Route::get('/{any}', function(){
        abort(404);
    })->where('any', '.*');
});

// Qui gestisco tutte le rotte con Vue
Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*");
