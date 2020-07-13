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
    return view('welcome');
});

//获取用户信息
Route::get('user/getUser/{id}', 'UserController@getUser');

//新增用户信息
Route::post('user/addUser/{name}/{sex}/{age}', 'UserController@addUser');

//修改用户信息
Route::put('user/updUser/{id}/{name}/{sex}/{age}', 'UserController@updUser');

//删除用户信息
Route::delete('user/delUser/{id}', 'UserController@delUser');

//获取帖子信息
Route::get('posts/getPosts/{id}', 'PostsController@getPosts');

//新增帖子信息
Route::post('posts/addPosts/{titel}/{content}/{creatorId}', 'PostsController@addPosts');

//修改帖子信息
Route::put('posts/updPosts/{id}/{titel}/{content}', 'PostsController@updPosts');

//删除帖子信息
Route::delete('posts/delPosts/{id}', 'PostsController@delPosts');

//根据用户id获取用户所发布的贴子
Route::get('user/getUserPosts/{id}', 'UserController@getUserPosts');

//帖子点赞
Route::post('posts/addDzinfo/{postsid}/{userid}', 'PostsController@addDzinfo');

//获取帖子点赞人列表
Route::get('posts/getDzinfo/{postsid}', 'PostsController@getDzinfo');
