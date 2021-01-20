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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
//ホーム画面表示
Route::get('/home', 'PostsController@index')->name('home');


//ブログ登録画面表示
Route::get('/post/create', 'PostsController@showCreate')->name('create');

//ブログ登録
Route::post('/post/store', 'PostsController@exeStore')->name('store');

//ブログ編集画面表示
Route::get('/post/edit/{id}', 'PostsController@showEdit')->name('edit');

//ブログ編集
Route::post('/post/update', 'PostsController@exeUpdate')->name('update');


//ブログ削除
Route::post('/post/delete/{id}','PostsController@exeDelete')->name('delete');

