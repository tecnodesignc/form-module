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

  /**
   * List or resources
   *
   * @return collection
   */
  public function getItemsBy($params)
  {
    return $this->remember(function () use ($params) {
      return $this->repository->getItemsBy($params);
    });
  }

  /**
   * find a resource by id or slug
   *
   * @return object
   */
  public function getItem($criteria, $params)
  {
    return $this->remember(function () use ($criteria, $params) {
      return $this->repository->getItem($criteria, $params);
    });
  }

  /**
   * create a resource
   *
   * @return mixed
   */
  public function create($data)
  {
    $this->clearCache();

    return $this->repository->create($data);
  }

}
