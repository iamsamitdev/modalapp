<?php

Route::get('/','ModalController@home');
Route::get('poform','ModalController@poform');
Route::get('customerform/{group}','ModalController@customerform');
Route::get('productform','ModalController@productform');
Route::post('submitOrder','ModalController@submitOrder');

Route::get('news-letter','ModalController@newsletter');
Route::post('news-letter','ModalController@postnewsletter');

Route::get('import-csv','ModalController@importcsv');
Route::post('import-csv','ModalController@postimportcsv');

Route::get('api/customers','ModalController@apicustomers');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
