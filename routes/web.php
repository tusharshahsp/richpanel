<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/products', array(
				'as'=>'products',
				'uses'=>'ProductsController@products'
));

Route::get('/men', array(
				'as'=>'productsmen',
				'uses'=>'ProductsController@men_products'
));

Route::get('/women', array(
				'as'=>'productswomen',
				'uses'=>'ProductsController@women_products'
));

Route::get('/kids', array(
				'as'=>'productskids',
				'uses'=>'ProductsController@kids_products'
));

Route::post('/addtoCart', array(
				'as'=>'productsaddtoCart',
				'uses'=>'ProductsController@addtoCart'
));

Route::get('/showplaceorder', array(
				'as'=>'createOrder',
				'uses'=>'OrderController@showplaceorder'
));
// Route::post('/addtoCart', array(
// 				'as'=>'products',
// 				'uses'=>'ProductsController@addtoCart'
// ));

// Route::get('/kids', array(
// 				'as'=>'products',
// 				'uses'=>'ProductsController@kids_products'
// ));


// Route::get('/addtocart', array(
// 				'as'=>'products',
// 				'uses'=>'ProductsController@kids_products'
// ));

// Route::post('/addtocart', 'TaskController');

// Route::resource('/task', 'TaskController');