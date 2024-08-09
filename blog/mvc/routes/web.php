<?php
use App\Controllers;
use App\Routes\Route;

Route::get('/commentaire', 'CommentairesController@index');
Route::get('/commentaire/create', 'CommentairesController@create');
Route::post('/commentaire/create', 'CommentairesController@store');
Route::get('/commentaire/show', 'CommentairesController@show');
Route::get('/commentaire/edit', 'CommentairesController@edit');
Route::post('/commentaire/edit', 'CommentairesController@update');
Route::post('/commentaire/delete', 'CommentairesController@delete');

Route::dispatch();