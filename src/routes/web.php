<?php

use Illuminate\Support\Facades\Route;



Route::get('register','Leila\RegistrationPlatform\Http\Controllers\AuthController@register');
Route::post('send-sms','Leila\RegistrationPlatform\Http\Controllers\AuthController@sendSMS');
Route::post('login','Leila\RegistrationPlatform\Http\Controllers\AuthController@login');


Route::middleware('auth:sanctum')->group(function (){
    Route::get('/logout','Leila\RegistrationPlatform\Http\Controllers\AuthController@logout');
});

