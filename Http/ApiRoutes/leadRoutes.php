<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'leads'], function (Router $router) {

  //Route create
  $router->post('/', [
    'as' => 'api.form.leads.create',
    'uses' => 'LeadApiController@create',
    'middleware' => ['captcha']
  ]);

  //Route index
  $router->get('/', [
    'as' => 'api.form.leads.get.items.by',
    'uses' => 'LeadApiController@index',
    'middleware' => ['auth:api']
  ]);

  //Route show
  $router->get('/{criteria}', [
    'as' => 'api.form.leads.get.item',
    'uses' => 'LeadApiController@show',
    'middleware' => ['auth:api']
  ]);
/*
  //Route update
  $router->put('/{criteria}', [
    'as' => 'api.form.leads.update',
    'uses' => 'LeadApiController@update',
    'middleware' => ['auth:api']
  ]);
*/
  //Route delete
  $router->delete('/{criteria}', [
    'as' => 'api.form.leads.delete',
    'uses' => 'LeadApiController@delete',
    'middleware' => ['auth:api']
  ]);
});

