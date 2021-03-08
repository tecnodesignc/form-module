<?php

namespace Modules\Form\Presenters;

use Modules\Form\Repositories\FormRepository;

abstract class AbstractFormPresenter implements FormPresenterInterface
{
    /**
     * @var FormRepository
     */
    protected $formRepository;

    /**
     * FormPresenter constructor.
     * @param FormRepository $formRepository
     */
    public function __construct(FormRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

}
