<?php
// Статические страницы с информацией

Route::get('/about', function () {
    $categoryList = App\Models\ProductCategory::all();
    return view('shop.pages.about', compact('categoryList'));
})->name('about');

Route::get('/contacts', function () {
    $categoryList = App\Models\ProductCategory::all();
    return view('shop.pages.contacts', compact('categoryList'));
})->name('contacts');

Route::get('/partner_info', function () {
    $categoryList = App\Models\ProductCategory::all();
    return view('shop.pages.partner_info', compact('categoryList'));
})->name('partner_info');

Route::get('/payment_info', function () {
    $categoryList = App\Models\ProductCategory::all();
    return view('shop.pages.payment_info', compact('categoryList'));
})->name('payment_info');

// Магазин

$groupData = [
	'namespace' => 'Shop',
];
Route::group($groupData, function () {

	Route::get('/', function () {
	    $categoryList = App\Models\ProductCategory::all();
	    return view('shop.pages.index', compact('categoryList'));
	})->name('index');

	$methods = ['index', 'show' ];

	Route::get('search', 'ProductController@search')
		->name('search');

	Route::get('basket', 'BasketController@index')
		->name('basket.index');

	Route::get('basket/{id}/addItem', 'BasketController@addItem')
		->name('basket.addItem');

	Route::get('basket/{id}/removeItem', 'BasketController@removeItem')
		->name('basket.removeItem');

	Route::get('basket/changeCount', 'BasketController@changeCount')
		->name('basket.changeCount');

	Route::get('basket/clear', 'BasketController@clear')
		->name('basket.clear');

	Route::get('basket/createOrder', 'BasketController@createOrder')
		->name('basket.orderForm');

	Route::post('basket/sendEmail', 'BasketController@sendEmail')
		->name('basket.sendEmail');

	Route::resource('products', 'ProductController')
		->only($methods)
		->names('products');

	Route::resource('categories', 'CategoryController')
		->only($methods)
		->names('categories');

});





Route::get('admin/login', 'AdminController@index')
	->name('admin.enterForm');

Route::get('admin/auth', 'AdminController@auth')
	->name('admin.auth');	

Route::get('admin/exit', 'AdminController@exit')
	->name('admin.exit');	

// Админка Магазина

$groupData = [
	'namespace' => 'Shop\Admin',
	'prefix'	=> 'admin/',
	'middleware' => 'admin'
];

Route::group($groupData, function () {
	Route::get('/', function () {
	    return view('admin.index');
	})->name('admin.index');


	// Product category

	Route::get('categories/restore/{id}/restore', 'CategoryController@restore');
	Route::post('categories/restore/{id}/restore', 'CategoryController@restore')
		->name('admin.categories.restore');

	$methods = ['index', 'edit', 'update', 'create', 'store', 'destroy' ];
	Route::resource('categories', 'CategoryController')
		->only($methods)
		->names('admin.categories');

	// Product

	Route::get('products/restore/{id}/restore', 'ProductController@restore');
	Route::post('products/restore/{id}/restore', 'ProductController@restore')
		->name('admin.products.restore');

	Route::resource('products', 'ProductController')
		->only($methods)
		->names('admin.products');

});
			

