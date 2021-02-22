<?php

namespace Support\Repos;

use App\General\Config;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Support\General\Config as Support;
use Support\Traits\Helpers;

class BaseRepo extends BaseRepository
{
    use Helpers;

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "";
    }

    public function query()
    {
        return $this->model->newQuery();
    }

    public function softDelete($ids, $column)
    {
        return $this->query()->whereIn($this->model->getKeyName(), $ids)->update([$column => Config::DELETED]);
    }

    public function Insert($data = [])
    {
        return $this->model->newQuery()->insert($data);
    }

    /**
     * pagination default
     * @param Builder  $query
     * @param int|null $items
     * @param string   $key
     * @return LengthAwarePaginator
     */
    protected function pagination(Builder $query, int $items = null, string $key = null)
    {
        $items = is_null($items) ? Support::PER_PAGE : $items;

        return $query->paginate($items)->appends(request()->except($key));
    }
}
