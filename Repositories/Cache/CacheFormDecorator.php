<?php

namespace Modules\Form\Repositories\Cache;

use Modules\Form\Repositories\FormRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
     * @return Model|Collection|Builder|array|null
     */
    public function findBySystemName($systemName):Model|Collection|Builder|array|null
    {
        return $this->remember(function () use ($systemName) {
            return $this->repository->findBySystemName($systemName);
        });
    }
}
