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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api routes to login and register
Route::post('login', 'api\ApiController@login');
Route::post('register', 'api\ApiController@register');


// email verification routes
// i duplicate the routes & controllers, provided by laravel auth for email verification
// and change there responses to json.
Route::get('email/verify/{id}', 'api\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'api\VerificationController@resend')->name('verification.resend');


// api password forgot and reset routes
// i duplicate the routes & controllers, provided by laravel auth for password forgot/and reset
// and change there responses to json.
Route::post('password/email', 'api\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'api\ResetPasswordController@reset')->name('password.update');


//following are the api routes protected by auth.jwt middleware
//only authorized user(having a token) can access to these routes
Route::group(['middleware' => 'auth.jwt'], function () {

    Route::get('logout', 'api\ApiController@logout');
    Route::get('user', 'api\ApiController@getAuthUser');
    Route::get('products', 'api\productController@index');
    Route::get('products/{id}', 'api\productController@show');
    Route::post('products', 'api\productController@store');
    Route::put('products/{id}', 'api\productController@update');
    Route::delete('products/{id}', 'api\productController@destroy');
});



