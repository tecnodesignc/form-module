<?php

namespace Modules\Form\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Form\Entities\Form;

interface FormRepository extends BaseRepository
{
    /**
     * @param string $systemName
     * @return Form
     */
    public function findBySystemName(string $systemName): Form;

}
