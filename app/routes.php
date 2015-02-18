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

Route::get('/', function()
{
	return View::make('modules.home');
});
Route::get('/home', function()
{
	return View::make('modules.home');
});
//Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
Route::get("getData", function()
{
 
    $posts = DB::table("users")->get();
    return Response::json(array(
        "posts"        =>        $posts
    ));
 
});

Route::post("/getData", function()
{    
    return User::create(Input::all());

});