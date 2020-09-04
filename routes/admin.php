<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Auth\Admin'],function(){
   // login
    Route::get('login','AdminLoginController@showLoginForm');
    Route::post('login','AdminLoginController@login')->name('admin.login');

    // Routes reset Password
    Route::group(['prefix'=>'password'],function (){
        // forget  password
        Route::get('reset','AdminForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('email','AdminForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');

        //reset password
        Route::get('reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('reset','AdminResetPasswordController@reset')->name('admin.password.update');
    });
    // pages admin
    Route::group(['middleware'=>'assign.guard:admin,/admin/login'],function(){
        Route::get('home',function (){
            return view('admin.home');
        });

    });
});




