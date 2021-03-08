<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/form'], function (Router $router) {
    $router->bind('form', function ($id) {
        return app('Modules\Form\Repositories\FormRepository')->find($id);
    });
    $router->get('forms', [
        'as' => 'admin.form.form.index',
        'uses' => 'FormController@index',
        'middleware' => 'can:form.forms.index'
    ]);
    $router->get('forms/create', [
        'as' => 'admin.form.form.create',
        'uses' => 'FormController@create',
        'middleware' => 'can:form.forms.create'
    ]);
    $router->post('forms', [
        'as' => 'admin.form.form.store',
        'uses' => 'FormController@store',
        'middleware' => 'can:form.forms.create'
    ]);
    $router->get('forms/{form}/edit', [
        'as' => 'admin.form.form.edit',
        'uses' => 'FormController@edit',
        'middleware' => 'can:form.forms.edit'
    ]);
    $router->put('forms/{form}', [
        'as' => 'admin.form.form.update',
        'uses' => 'FormController@update',
        'middleware' => 'can:form.forms.edit'
    ]);
    $router->delete('forms/{form}', [
        'as' => 'admin.form.form.destroy',
        'uses' => 'FormController@destroy',
        'middleware' => 'can:form.forms.destroy'
    ]);
    $router->bind('field', function ($id) {
        return app('Modules\Form\Repositories\FieldRepository')->find($id);
    });
    $router->get('fields', [
        'as' => 'admin.form.field.index',
        'uses' => 'FieldController@index',
        'middleware' => 'can:form.fields.index'
    ]);
    $router->get('fields/create', [
        'as' => 'admin.form.field.create',
        'uses' => 'FieldController@create',
        'middleware' => 'can:form.fields.create'
    ]);
    $router->post('fields', [
        'as' => 'admin.form.field.store',
        'uses' => 'FieldController@store',
        'middleware' => 'can:form.fields.create'
    ]);
    $router->get('fields/{field}/edit', [
        'as' => 'admin.form.field.edit',
        'uses' => 'FieldController@edit',
        'middleware' => 'can:form.fields.edit'
    ]);
    $router->put('fields/{field}', [
        'as' => 'admin.form.field.update',
        'uses' => 'FieldController@update',
        'middleware' => 'can:form.fields.edit'
    ]);
    $router->delete('fields/{field}', [
        'as' => 'admin.form.field.destroy',
        'uses' => 'FieldController@destroy',
        'middleware' => 'can:form.fields.destroy'
    ]);
    $router->bind('lead', function ($id) {
        return app('Modules\Form\Repositories\LeadRepository')->find($id);
    });
    $router->get('leads', [
        'as' => 'admin.form.lead.index',
        'uses' => 'LeadController@index',
        'middleware' => 'can:form.leads.index'
    ]);
    $router->get('leads/create', [
        'as' => 'admin.form.lead.create',
        'uses' => 'LeadController@create',
        'middleware' => 'can:form.leads.create'
    ]);
    $router->post('leads', [
        'as' => 'admin.form.lead.store',
        'uses' => 'LeadController@store',
        'middleware' => 'can:form.leads.create'
    ]);
    $router->get('leads/{lead}/edit', [
        'as' => 'admin.form.lead.edit',
        'uses' => 'LeadController@edit',
        'middleware' => 'can:form.leads.edit'
    ]);
    $router->put('leads/{lead}', [
        'as' => 'admin.form.lead.update',
        'uses' => 'LeadController@update',
        'middleware' => 'can:form.leads.edit'
    ]);
    $router->delete('leads/{lead}', [
        'as' => 'admin.form.lead.destroy',
        'uses' => 'LeadController@destroy',
        'middleware' => 'can:form.leads.destroy'
    ]);
// append



});
