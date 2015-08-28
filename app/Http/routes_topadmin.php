<?php
Route::group(['prefix' => 'adm', 'namespace' => 'TopAdmin'], function()
{


    Route::get("login", [
        'as' => 'topadmin.login', 'uses' => 'TopAdminPanel@login'
    ]);

    Route::post("login", [
        'as' => 'topadmin.dologin', 'uses' => 'TopAdminPanel@login'
    ]);

    Route::get("logout", [
        'as' => 'topadmin.logout', 'uses' => 'TopAdminPanel@logout'
    ]);

    Route::group(['middleware' => 'LoginTopAdminChecker'], function(){
        Route::get("dashboard", [
            'as' => 'topadmin.dashboard', 'uses' => 'TopAdminPanel@dashboard'
        ]);
        Route::get("/", [
            'as' => 'topadmin.dashboard', 'uses' => 'TopAdminPanel@login'
        ]);
    });
});