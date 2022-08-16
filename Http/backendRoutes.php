<?php

use Illuminate\Routing\Router;

/** @var Router $router
 **/
$router->group(['prefix' => '/form'], function (Router $router) {
    $router->group(['prefix' => '/forms'], function (Router $router) {
        $router->bind('form', function ($id) {
            return app('Modules\Form\Repositories\FormRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.form.form.index',
            'uses' => 'FormController@index',
            'middleware' => 'can:form.forms.index'
        ]);
        $router->get('/create', [
            'as' => 'admin.form.form.create',
            'uses' => 'FormController@create',
            'middleware' => 'can:form.forms.create'
        ]);
        $router->post('/', [
            'as' => 'admin.form.form.store',
            'uses' => 'FormController@store',
            'middleware' => 'can:form.forms.create'
        ]);
        $router->get('/{form}/edit', [
            'as' => 'admin.form.form.edit',
            'uses' => 'FormController@edit',
            'middleware' => 'can:form.forms.edit'
        ]);
        $router->put('/{form}', [
            'as' => 'admin.form.form.update',
            'uses' => 'FormController@update',
            'middleware' => 'can:form.forms.edit'
        ]);
        $router->delete('/{form}', [
            'as' => 'admin.form.form.destroy',
            'uses' => 'FormController@destroy',
            'middleware' => 'can:form.forms.destroy'
        ]);
        $router->group(['prefix' => '{form}/fields'], function (Router $router) {
            $router->bind('field', function ($id) {
                return app('Modules\Form\Repositories\FieldRepository')->find($id);
            });
            $router->get('/', [
                'as' => 'admin.form.field.index',
                'uses' => 'FieldController@index',
                'middleware' => 'can:form.fields.index'
            ]);
            $router->get('/create', [
                'as' => 'admin.form.field.create',
                'uses' => 'FieldController@create',
                'middleware' => 'can:form.fields.create'
            ]);
            $router->post('/', [
                'as' => 'admin.form.field.store',
                'uses' => 'FieldController@store',
                'middleware' => 'can:form.fields.create'
            ]);
            $router->get('/{field}/edit', [
                'as' => 'admin.form.field.edit',
                'uses' => 'FieldController@edit',
                'middleware' => 'can:form.fields.edit'
            ]);
            $router->put('/{field}', [
                'as' => 'admin.form.field.update',
                'uses' => 'FieldController@update',
                'middleware' => 'can:form.fields.edit'
            ]);
            $router->delete('/{field}', [
                'as' => 'admin.form.field.destroy',
                'uses' => 'FieldController@destroy',
                'middleware' => 'can:form.fields.destroy'
            ]);
        });
        $router->group(['prefix' => '{form}/leads'], function (Router $router) {
            $router->bind('lead', function ($id) {
                return app('Modules\Form\Repositories\LeadRepository')->find($id);
            });
            $router->get('/', [
                'as' => 'admin.form.lead.index',
                'uses' => 'LeadController@index',
                'middleware' => 'can:form.leads.index'
            ]);

            $router->get('/{lead}/view', [
                'as' => 'admin.form.lead.edit',
                'uses' => 'LeadController@edit',
                'middleware' => 'can:form.leads.edit'
            ]);
// append
        });
    });



});
