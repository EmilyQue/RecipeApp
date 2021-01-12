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

/*Route is mapped to the '/home' URI and will return the Home view */
Route::get('/home', function () {
    return view('home');
});


/*Route is mapped to the '/addRecipe' URI and will return the Recipe view */
Route::get('/addRecipe', function() {
    return view('addRecipe');
});

/*Fetches the post parameters of registration*/
Route::post('/addRecipe', 'App\Http\Controllers\RecipeController@index');
