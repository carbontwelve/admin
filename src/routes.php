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

        Route::group(
            array('prefix' => 'users'),
            function () {

                Route::get(
                    '/',
                    array
                    (
                        'as' => 'administration.users.index',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\UserController@index'
                    )
                );

                Route::get(
                    'add',
                    array
                    (
                        'as' => 'administration.users.add',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\UserController@add'
                    )
                );
            }
        );

        Route::group(
            array('prefix' => 'permissions'),
            function () {

                Route::get(
                    '/',
                    array
                    (
                        'as' => 'administration.permissions.index',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\PermissionController@index'
                    )
                );

                Route::get(
                    'add',
                    array
                    (
                        'as' => 'administration.permissions.add',
                        'uses' => 'Carbontwelve\Admin\Controllers\Backend\PermissionController@add'
                    )
                );
            }
        );
    }
);
