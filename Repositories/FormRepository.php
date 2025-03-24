<?php

namespace Modules\Form\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface FormRepository extends BaseRepository
{
    /**
     * @param string $systemName
     * @return Model|Collection|Builder|array|null
     */
    public function findBySystemName(string $systemName): Model|Collection|Builder|array|null;

}
