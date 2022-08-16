<?php

namespace Modules\Form\Repositories\Cache;

use Modules\Form\Repositories\FieldRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFieldDecorator extends BaseCacheDecorator implements FieldRepository
{
  public function __construct(FieldRepository $field)
  {
    parent::__construct();
    $this->entityName = 'form.fields';
    $this->repository = $field;
  }

}
