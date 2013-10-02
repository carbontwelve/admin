<?php


Route::group(
    array('prefix' => 'administration'),
    function () {

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
