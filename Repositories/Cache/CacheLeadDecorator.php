<?php

namespace Modules\Form\Repositories\Cache;

use Modules\Form\Repositories\LeadRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLeadDecorator extends BaseCacheDecorator implements LeadRepository
{
  public function __construct(LeadRepository $lead)
  {
    parent::__construct();
    $this->entityName = 'form.leads';
    $this->repository = $lead;
  }


}
