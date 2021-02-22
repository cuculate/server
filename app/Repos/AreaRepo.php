<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Area;
use Illuminate\Database\Eloquent\Builder;

class AreaRepo extends BaseRepo
{
    function model()
    {
        return Area::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Area::$_name, 'like', "%$keyword%")
                    ->orWhere(Area::$_information, 'like', "%$keyword%");
            });
        });

        $query = $query->where(Area::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Area::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Area::$_status, array_keys(Config::STATUS))
            ->where(Area::$_id, $id)
            ->first();
    }

    public function getSelectArea()
    {
        $query = $this->query()->where(Area::$_status, Config::ACTIVE);

        return $query->select(Area::$_all)->get();
    }

    public function findArea($id)
    {
        return $this->query()
            ->where(Area::$_id,$id)
            ->where(Area::$_status,Config::ACTIVE)
            ->first();
    }
}
