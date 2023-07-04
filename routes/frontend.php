<?php


Route::group([ 'as' => 'frontend.', 'namespace' => 'Frontend'] ,function(){
    // Home
    Route::get('/','HomeController@index')->name('home');
    // register
    Route::get('register', 'RegisterController@index')->name('register');
    Route::post('register_seller','RegisterController@register_seller')->name('register_seller');
    Route::post('register_customer','RegisterController@register_customer')->name('register_customer');

    //course
    Route::get('course','HomeController@course')->name('courses');
    Route::get('courses/{id}', 'HomeController@singlecourse')->name('singlecourse');

    // about and Contact
    Route::get('about', 'AboutController@index')->name('about-us');


    // blogs
    Route::get('blogs', 'BlogController@index')->name('blogs');
    Route::get('blogs/{id}', 'BlogController@show')->name('blogbyid');

    // shops
    Route::get('shops', 'ShopController@index')->name('shops');
    Route::get('shop/{id}', 'ShopController@shop')->name('shop');
    Route::get('shop', 'ShopController@show')->name('marketshop');

    // forums
    Route::get('forums', 'ForumController@index')->name('forums');
    Route::get('forum/{id}', 'ForumController@show')->name('post');

    // cart & whhitelist
    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('whitelist', 'WhitelistController@index')->name('whitelist');

    // product
    Route::get('product/{id}','ProductController@show')->name('product');
    Route::get('show_popup','ProductController@show_popup')->name('productpopup');
    
    

    // checkout
    Route::get('checkout', 'CheckoutController@index')->name('checkout');

    // login
    Route::get('userlogin', 'LoginController@index')->name('userlogin');

});


Route::group(['prefix' => 'customer','as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth','customer']] ,function(){
    // account
    Route::get('dashboard', 'HomeController@index')->name('home');
    // cart
    Route::get('cart/show', 'HomeController@show')->name('cart.show');
    Route::post('cart/store', 'HomeController@cart_store_product')->name('cart.store');
    Route::post('cart/update', 'HomeController@updateCart')->name('cart.update');
    Route::delete('cart/remove', 'HomeController@cart_remove_product')->name('cart.remove');
    // order 
    Route::post('order/store', 'OrderController@store')->name('order.store');


// Add more routes for cart actions as needed


    //Contact
    Route::get('contact', 'ContactController@index')->name('contact-us');
    Route::Post('/send', 'ContactController@store')->name('sendmessage');



});
Route::group(['prefix' => 'seller', 'as' => 'seller.', 'namespace' => 'Seller', 'middleware' => ['auth','seller']] ,function(){
    // account
    Route::get('dashboard', 'HomeController@index')->name('home');

});