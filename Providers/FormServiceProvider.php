<?php

namespace Modules\Form\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Form\Presenters\FormPresenter;
use Modules\Form\Events\Handlers\RegisterFormSidebar;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Arr;

class FormServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterFormSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('forms', Arr::dot(trans('form::forms')));
            $event->load('fields', Arr::dot(trans('form::fields')));
            $event->load('leads', Arr::dot(trans('form::leads')));
        });


    }

    public function boot()
    {
        $this->publishConfig('form', 'permissions');
        $this->publishConfig('form', 'config');
        $this->publishConfig('form', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('form');
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Form\Repositories\FormRepository',
            function () {
                $repository = new \Modules\Form\Repositories\Eloquent\EloquentFormRepository(new \Modules\Form\Entities\Form());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Form\Repositories\Cache\CacheFormDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Form\Repositories\FieldRepository',
            function () {
                $repository = new \Modules\Form\Repositories\Eloquent\EloquentFieldRepository(new \Modules\Form\Entities\Field());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Form\Repositories\Cache\CacheFieldDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Form\Repositories\LeadRepository',
            function () {
                $repository = new \Modules\Form\Repositories\Eloquent\EloquentLeadRepository(new \Modules\Form\Entities\Lead());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Form\Repositories\Cache\CacheLeadDecorator($repository);
            }
        );
        $this->app->bind('Modules\Form\Presenters\FormPresenter');

    }
}
