<?php


Route::group(
    array('prefix' => 'administration'),
    function () {

        Route::get(
            '/dashboard',
            array
            (
                'as' => 'administration.dashboard',
                'uses' => 'Carbontwelve\Admin\Controllers\Backend\AdminDashboardController@index'
            )
        );

        Route::group(
            array('prefix' => 'groups'),
            function () {

                Route::get(
                    '/',
                    array
                    (
                        'as' => 'administration.groups.index',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\GroupController@index'
                    )
                );

                Route::get(
                    'add',
                    array
                    (
                        'as' => 'administration.groups.add',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\GroupController@add'
                    )
                );
            }
        );
    }
);
