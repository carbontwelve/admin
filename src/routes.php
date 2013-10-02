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
                        'uses' => 'Carbontwelve\Admin\Controllers\BackendGroupController@index'
                    )
                );

            }
        );
    }
);
