<?php

use App\Http\Controllers\TagsController;

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

Route::get('/test', function(){
    return App\Tag::find(2)->post;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/category/create' , 'CategoriesController@create')->name('category.create');

    Route::get('/categories' , 'CategoriesController@index')->name('categories');

    Route::post('/category/store' , 'CategoriesController@store')->name('category.store');

    Route::get('/category/edit/{category}' , 'CategoriesController@edit')->name('category.edit');

    Route::get('/category/delete/{category}' , 'CategoriesController@destroy')->name('category.delete');

    Route::post('/category/update/{category}' , 'CategoriesController@update')->name('category.update');

    Route::get('/post/create' , 'PostsController@create')->name('post.create');

    Route::get('/posts' , 'PostsController@index')->name('posts');

    Route::get('/posts/trashed' , 'PostsController@trashed')->name('posts.trashed');

    Route::get('/post/restore/{post}' , 'PostsController@restore')->name('post.restore');

    Route::get('/post/edit/{post}' , 'PostsController@edit')->name('post.edit');

    Route::post('/post/update/{post}' , 'PostsController@update')->name('post.update');
    
    Route::get('/post/kill/{post}' , 'PostsController@kill')->name('post.kill');

    Route::post('/post/store' , 'PostsController@store')->name('post.store');

    Route::get('/post/delete/{post}' , 'PostsController@destroy')->name('post.delete');

    Route::get('/tags', 'TagsController@index')->name('tags');

    Route::get('/tag/create', 'TagsController@create')->name('tag.create');

    Route::post('/tag/store', 'TagsController@store')->name('tag.store');

    Route::get('/tag/edit/{tag}', 'TagsController@edit')->name('tag.edit');

    Route::post('/tag/update/{tag}', 'TagsController@update')->name('tag.update');

    Route::get('/tag/delete/{tag}', 'TagsController@destroy')->name('tag.delete');


});
