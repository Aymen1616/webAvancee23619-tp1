<?php
use App\Controllers;
use App\Routes\Route;
use App\Controllers\ArticlesController;
use App\Controllers\ContactController;


Route::get('/article', 'ArticlesController@show');
Route::get('/commentaire', 'CommentairesController@index');
Route::get('/commentaire/create', 'CommentairesController@create');
Route::post('/commentaire/create', 'CommentairesController@store');
Route::get('/commentaire/show', 'CommentairesController@show');
Route::get('/commentaire/edit', 'CommentairesController@edit');
Route::post('/commentaire/edit', 'CommentairesController@update');
Route::post('/commentaire/delete', 'CommentairesController@delete');

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


Route::get('/contact/send', 'ContactController@create');
Route::post('/contact/send', 'ContactController@send');


Route::dispatch();