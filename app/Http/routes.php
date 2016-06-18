<?php


Route::get('/', function () {
	return view('welcome');
});

Route::resource('post','PostController');
Route::resource('user','AnggotaController');
Route::resource('tag','TagController');
Route::resource('comment','CommentController');
Route::resource('notifier','NotifierController');
Route::resource('notif','NotifController');