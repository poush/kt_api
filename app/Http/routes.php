<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

Route::get('/', function () {
    return view('index');
});


/**
 *  Api Routes
 */

ApiRoute::version('v1', function(){

	ApiRoute::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function(){
		
		ApiRoute::group(['prefix' => 'orders'], function(){

			ApiRoute::get('/','OrderController@index');
			ApiRoute::get('stats','OrderController@stats');
			ApiRoute::get('cells','OrderController@cells');
			ApiRoute::get('{id}','OrderController@show');

		});

	});

	ApiRoute::group(['prefix' => 'web', 'namespace' => 'App\Http\Controllers\Web'], function(){

		ApiRoute::get('products','ProductController@show');

		ApiRoute::group(['prefix' => 'orders'],function(){
			ApiRoute::post('place','OrderController@place');
		});

		// ApiRoute::post('contact','')
	});

});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
   

	// Route::group(['prefix' => 'admin', 'middleware' => 'auth'])

	// Route::group(['prefix' => 'api'],function() {

	// 	Route::get('products', 'ProductController@show');

	// 	Route::group(['prefix' => 'orders'],function(){

	// 		//Place an order
	// 		Route::post('place','OrderController@place');

	// 		Route::group(['middleware' => 'admin'],function(){

	// 			//Cancel Order
	// 			Route::get('cancel','OrderController@cancel');

	// 			//Verify Order
	// 			Route::get('verify/{id}','OrdersController@verify');

	// 			//View an Order
	// 			Route::get('{number}','OrderController@show');
				
	// 			//Update Order
	// 			Route::put('update','OrderController@update');

	// 			//setDelivery
	// 			Route::post('addDelivery','OrderController@setDelivery');

	// 		});

	// 	});




	// });
// });
