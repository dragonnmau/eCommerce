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

Route::get('/', 'MainController@home')->name('home');
Route::get('/search', 'ProductsController@search');
Route::get('/carrito', 'ShoppingCartsController@index');
Route::get('/payments/store', 'PaymentsController@store');
Route::get('/aviso', 'MainController@aviso');
Route::get('/condiciones', 'MainController@conditions');


Route::get('/payments/store', 'PaymentsController@store');

Route::post('/carrito', 'ShoppingCartsController@checkout');

Auth::routes();

Route::resource('products', 'ProductsController');
Route::resource('in_shopping_carts', 'InShoppingCartsController', [
	'only' => ['store' , 'destroy']
	]);

Route::get('products/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");

	if(!\File::exists($path)) abort(404);

	$file = \File::get($path);

	$type = \File::mimeType($path);

	$response = Response::make($file,200);

	$response->header("Content-Type",$type);

	return $response;
});


/*
GET /products=> index
POST /producst => store
GET /products/create => form crear

GET /products/:id => mostrar producto id

*/
//Route::get('/home', 'HomeController@index')->name('home');
