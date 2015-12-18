<?php

Route::get('/','ModalController@home');
Route::get('poform','ModalController@poform');
Route::get('customerform','ModalController@customerform');
Route::get('productform','ModalController@productform');
Route::post('submitOrder','ModalController@submitOrder');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
