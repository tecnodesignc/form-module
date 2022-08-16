<?php

namespace Modules\Form\Repositories\Cache;

use Modules\Form\Repositories\FormRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFormDecorator extends BaseCacheDecorator implements FormRepository
{
  public function __construct(FormRepository $form)
  {
    parent::__construct();
    $this->entityName = 'form.forms';
    $this->repository = $form;
  }

    /**
     * Find by System Name
     * @param $systemName
     * @return mixed
     */
    public function findBySystemName($systemName)
    {
        return $this->remember(function () use ($systemName) {
            return $this->repository->findBySystemName($systemName);
        });
    }
}
