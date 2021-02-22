<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Age;
use Illuminate\Database\Eloquent\Builder;

class AgeRepo extends BaseRepo
{
    function model()
    {
        return Age::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function(Builder $q) use ($keyword) {
                return $q->where(Age::$_name,'like',"%$keyword%")
                    ->orWhere(Age::$_month,'like',"%$keyword%");
            });
        });

        $query = $query->where(Age::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Age::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Age::$_status, array_keys(Config::STATUS))
            ->where(Age::$_id, $id)
            ->first();
    }

    public function getSelectAge() {
        $query = $this->query()->where(Age::$_status,Config::ACTIVE);

        return $query->select(Age::$_all)->get();
    }
}
