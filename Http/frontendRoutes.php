<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'form'], function (Router $router) {

    $router->get('/thank-you', [
        'as' => 'form.thank',
        'uses' => 'PublicController@thank',
    ]);
    $router->post('/lead', [
        'as' => 'form.lead',
        'uses' => 'PublicController@store',
    ]);

});
