<?php

namespace Modules\Form\Presenters;

interface FormPresenterInterface
{
    /**
     * @param $formName
     * @return string rendered slider
     */
    public function render($formName);
}
