<?php

Route::group([
    'as'        => 'jobs-stats',
    'prefix'    => 'jobs-stats',
    'namespace' => 'Crazybooot\JobsStats\Http\Controllers',
], function () {
    Route::get('/', [
        'as'   => '.index',
        'uses' => 'JobsStatsController@index',
    ]);

    Route::get('/list', [
        'as'   => '.list',
        'uses' => 'JobsStatsController@list',
    ]);
});