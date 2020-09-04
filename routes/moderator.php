<?php

use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'moderator','namespace'=>'Auth\Moderator'],function(){
    Route::get('login','ModeratorLoginController@showLoginForm');
    Route::post('login','ModeratorLoginController@login')->name('moderator.login');

    // Routes reset Password

    Route::group(['prefix'=>'password'],function(){
       Route::get('reset','ModeratorForgetPasswordController@showLinkRequestForm')->name('moderator.password.request');
       Route::post('email','ModeratorForgetPasswordController@sendResetLinkEmail')->name('moderator.password.email');
       Route::get('reset/{token}','ModeratorResetPasswordController@showResetForm')->name('moderator.password.reset');
       Route::post('reset','ModeratorResetPasswordController@reset')->name('moderator.password.update');
    });

    // pages moderators
    Route::group(['middleware'=>'assign.guard:moderator,/moderator/login'],function(){
        Route::get('home',function (){
            return view('moderator.home');
        });

    });

});




