<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::get('/', 'PagesController@index');
Route::get('about', 'PagesController@about');


Route::resource('items', 'ItemsController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::post('image/upload', function(Request $request){
    dd($request->all());
});

Route::put('locale/set/{locale}', function($locale = 'en') {
    Session::set('locale', $locale);
});

Route::get('pictures/get/{filename}',
    [
        'as' => 'picture',
        'uses' => 'PicturesController@get'
    ])
    ->where('filename', '.+');