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
    return App\Category::all();
});

Route::get('/category/{category}', 'FrontendController@category')->name('category.single');

Route::get('/tag/{tag}', 'FrontendController@tag')->name('tag.single');

Route::get('/', 'FrontendController@index')->name('index');

Route::get('/post/{slug}', 'FrontendController@singlePost')->name('post.single');

Route::get('/results', 'FrontendController@results')->name('results');


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/dashboard', 'HomeController@index')->name('home');

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

    Route::get('/users', 'Userscontroller@index')->name('users');

    Route::get('/user/create', 'Userscontroller@create')->name('user.create');

    Route::post('/user/store', 'Userscontroller@store')->name('user.store');

    Route::get('/user/delete/{user}', 'Userscontroller@destroy')->name('user.delete');

    Route::get('/user/admin/{user}', 'Userscontroller@admin')->name('user.admin');

    Route::get('/user/not-admin/{user}', 'Userscontroller@not_admin')->name('user.not.admin');

    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');

    Route::post('/user/profile/update', 'ProfilesController@update')->name('user.profile.update');

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

});
