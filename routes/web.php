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
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;


Auth::routes();


// SiteController
Route::get('/', 'SiteController@getCategories')->name('home');

Route::get('/product-details/{id}', 'SiteController@getProductDetails')->name('product-details');

Route::get('/contact', 'SiteController@showContact')->name('contact');

// BlogController
Route::get('/blog', 'BlogController@showBlog')->name('blog');




// CatalogController
Route::get('/category/{id?}', 'CatalogController@getCategoryId')->name('catalog');

Route::get('/category/catalog', 'CatalogController@getCatalog')->name('main-catalog');

// CabinetController
Route::get('/cabinet', 'CabinetController@showCabinet')->name('cabinet');

Route::get('/account', 'CabinetController@showAccount')->name('account');

Route::get('/cabinet/cart', 'CabinetController@showCart')->name('cart');

Route::get('/cabinet/add/{id?}', 'CabinetController@addToCart')->name('addcart');

// Ajax
Route::get('/cabinet/add-ajax/{id?}', 'CabinetController@addAjaxToCart')->name('addajaxcart');

Route::get('/cabinet/delete/{id?}', 'CabinetController@deleteItem')->name('deleteItem');





// OrderController
Route::match(['post', 'get'], '/order', 'OrderController@getCheckOut')->name('checkout');

Route::get('/order/done', 'OrderController@showDone')->name('done');

Route::post('/order/store', 'OrderController@storeOrder')->name('storeorder');

// PostController
Route::post('/product-details/addpost/{id?}', 'PostController@addPost')->name('addpost');

Route::get('/product-details/delete/{id?}', 'PostController@deletePost')->name('delete');

Route::get('/product-details/addlike/{id?}', 'PostController@addLike')->name('addlike');

Route::get('/product-details/removelike/{id?}', 'PostController@removeLike')->name('removelike');

// Edit
Route::get('/account/edit', 'CabinetController@showEditProfile')->name('editprofile');

Route::post('/account/edit', 'CabinetController@postEditProfile')->name('editprofile');

// Список покупок
Route::get('/account/bought', 'CabinetController@showBoughtList')->name('boughtlist');

// Mail

/* Route::post('/sendmail', function(Request $reqeust, Mailer $mailer) {

	$mailer->to($reqeust->input('mail'))
										->send(new \App\Mail\MyMail($reqeust->input('title')));
										return redirect()->back();

})->name('sendmail');


Route::get('/sendmail', function() {

	return view('mail.mail');

}); */