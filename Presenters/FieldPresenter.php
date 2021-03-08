<?php

namespace Modules\Form\Presenters;

use Laracasts\Presenter\Presenter;

class FieldPresenter extends Presenter
{
    /**
     * @var \Modules\Form\Entities\Type
     */
    protected $types;
    /**
     * @var \Modules\Form\Repositories\FieldRepository
     */
    private $field;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->field = app('Modules\Form\Repositories\FieldRepository');
        $this->types = app('Modules\Form\Entities\Type');
    }

    public function type()
    {
        return $this->types->get($this->entity->type);
    }



}
