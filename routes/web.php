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

Route::get('/', 'BlogController@index');
// Route::get('/isi-post', function(){
//     return view('blog1.isi');
// });

Route::get('/isi-post/{slug}', 'BlogController@isi_blog')->name('blog.isi');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    
});

Auth::routes(['register' => false]);
