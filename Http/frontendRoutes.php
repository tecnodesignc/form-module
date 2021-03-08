<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'form'], function (Router $router) {

    $router->get('/lead', [
        'as' => 'form.lead',
        'uses' => 'PublicController@store',
        //'middleware' => config('encore.blog.config.middleware'),
    ]);

});
