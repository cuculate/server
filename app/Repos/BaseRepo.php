<?php

namespace App\Repos;

use App\General\Config;
use Illuminate\Database\Query\Builder;
use Support\Repos\BaseRepo as SupportRepo;

class BaseRepo extends SupportRepo
{
    /**
     * @param array $status
     * @param string $column
     * @return int
     */
    public function countByStatus(array $status, $column = 'status')
    {
        return $this->query()->whereIn($column, $status)->count();
    }
}
