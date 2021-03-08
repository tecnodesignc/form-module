<?php

namespace Modules\Form\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Form\Events\Handlers\SendEmail;
use Modules\Form\Events\LeadWasCreated;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        LeadWasCreated::class=>[
            SendEmail::class,
        ]
    ];
}
