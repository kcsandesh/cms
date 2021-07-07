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

use App\Http\Controllers\Blog\BlogController;
use App\Http\Middleware\VerifyIsAdmin;

Route::get('/blog/{post}',[BlogController::class,'show'])->name('blog.show');
Route::get('/blog/category/{category}',[BlogController::class,'category'])->name('blog.category');
Route::get('/blog/tag/{tag}',[BlogController::class,'tag'])->name('blog.tag');

Route::get('/','WelcomeController@index')->name('welcome');

Auth::routes();





Route::middleware(['auth'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');

Route::resource('posts', 'PostsController');

Route::get('/trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-posts');

Route::resource('tags','TagsController');

});

route::middleware(['auth','VerifyIsAdmin'])->group(function(){
    Route::get('users','UsersController@index')->name('users.index');
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/update-profile','UsersController@update')->name('users.update-profile');
    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
});
