<?php

    Auth::routes();

  Route::get('/home', 'AdminController@index')->name('home');





    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'],'/update-pwd', 'AdminController@updatePassword');

    //vendor route
    Route::match(['get','post'],'/add-vendor', 'VendorController@create')->name('admin.add-vendor');

    //store route
    Route::match(['get','post'],'/add-store', 'StoreController@create')->name('admin.add-store');
    Route::get('/view-stores', 'StoreController@viewStore');
    Route::match(['get','post'],'/edit-store/{id}', 'StoreController@editStore')->name('admin.edit-store');
    Route::match(['get','post'],'/admin/delete-store/{id}', 'storeController@destroyStore');

    //storeLocation route
    Route::match(['get','post'],'/add-storelocation', 'StoreLocationController@create')->name('admin.add-storelocation');
    Route::get('/view-storelocations', 'StoreLocationController@viewStoreLocation');
    Route::match(['get','post'],'/edit-storelocation/{id}', 'StoreLocationController@editStoreLocation')->name('admin.edit-storelocation');
    Route::match(['get','post'],'/admin/delete-storelocation/{id}', 'storeLocationController@destroyStorelocation');

    //product route
    Route::match(['get','post'],'/add-product', 'ProductController@createProduct')->name('admin.add-product');
    Route::get('/view-products', 'ProductController@viewProducts');
    Route::match(['get','post'],'/edit-product/{id}', 'ProductController@editProduct')->name('admin.edit-product');
    Route::match(['get','post'],'/admin/delete-product/{id}', 'ProductController@destroyProduct');

    //product-image route
    Route::match(['get','post'],'/add-product-image/{id}', 'ProductImageController@addImage');
    Route::get('/delete-alt-image/{id}', 'ProductImageController@deleteAltimage');





