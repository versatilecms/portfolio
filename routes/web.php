<?php

/**
 * Portfolio module
 */
Route::group([
    'prefix' => 'portfolio', // Must match its `slug` record in the DB > `data_types`
    'middleware' => ['web'],
    'as' => 'versatile-frontend.portfolio.',
    'namespace' => '\Versatile\Portfolio\Http\Controllers'
], function () {
    Route::get('/', ['uses' => 'PortfolioController@getPosts', 'as' => 'list']);
    Route::get('{slug}', ['uses' => 'PortfolioController@getPost', 'as' => 'post']);
});
