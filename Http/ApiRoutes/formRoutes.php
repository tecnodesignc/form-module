<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'forms'], function (Router $router) {

  //Route create
  $router->post('/', [
    'as' => 'api.form.forms.create',
    'uses' => 'FormApiController@create',
    'middleware' => ['auth:api']
  ]);

  //Route index
  $router->get('/', [
    'as' => 'api.form.forms.get.items.by',
    'uses' => 'FormApiController@index',
    'middleware' => ['auth:api']
  ]);

  //Route show
  $router->get('/{criteria}', [
    'as' => 'api.form.forms.get.item',
    'uses' => 'FormApiController@show',
    //'middleware' => ['auth:api']
  ]);

  //Route update
  $router->put('/{criteria}', [
    'as' => 'api.form.forms.update',
    'uses' => 'FormApiController@update',
    'middleware' => ['auth:api']
  ]);

  //Route delete
  $router->delete('/{criteria}', [
    'as' => 'api.form.forms.delete',
    'uses' => 'FormApiController@delete',
    'middleware' => ['auth:api']
  ]);
});
