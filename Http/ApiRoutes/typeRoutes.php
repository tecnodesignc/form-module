<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'types'], function (Router $router) {

  //Route index
  $router->get('/', [
    'as' => 'api.form.types.index',
    'uses' => 'TypeApiController@index',
    'middleware' => ['auth:api']
  ]);

});

