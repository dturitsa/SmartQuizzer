<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "QuestionsController@randomQuestion");

Route::resource('questions', 'QuestionsController');

Route::get('random', "QuestionsController@randomQuestion");

Route::get('reset', "QuestionsController@resetViewed");

Route::get('about', "about");

Route::get('about', function(){

    return View::make('about');
});



