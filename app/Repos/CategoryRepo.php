<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepo extends BaseRepo
{
    function model()
    {
        return Category::class;
    }

    public function search(array $relation = ['categories'])
    {
        $query = $this->query()->with($relation);

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';
        $parents = request()->has('parents') ? explode(',', request('parents')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(Category::$_name,'like',"%$keyword%");
        });

        $query = $query->where(Category::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Category::$_status, $status);
        });

        $query = $query->when(!empty($parents), function (Builder $b) use ($parents) {
            return $b->whereIn(Category::$_parentID, $parents);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Category::$_status, array_keys(Config::STATUS))
            ->where(Category::$_id, $id)
            ->first();
    }

    public function getSelectCategory()
    {
        $query = $this->query()->where(Category::$_status,Config::ACTIVE)
                                ->where(Category::$_parentID,'>',0);

        return $query->select(Category::$_all)->get();
    }

    public function getSelectParent()
    {
        $query = $this->query()->whereNull(Category::$_parentID)
        ->with('childrenCategories');

        return $query->select(Category::$_name,Category::$_id)->get();
    }
}
