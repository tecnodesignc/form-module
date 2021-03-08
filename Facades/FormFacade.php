<?php

namespace Modules\Form\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Form\Presenters\FormPresenter;


class FormFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FormPresenter::class;
    }

}
