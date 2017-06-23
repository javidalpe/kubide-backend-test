<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('notes', 'NoteController');
Route::post('notes/{id}/favorite', ['uses'=>'NoteController@favorite']);
Route::post('notes/{id}/unfavorite', ['uses'=>'NoteController@unfavorite']);
