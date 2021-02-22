<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder;

class BrandRepo extends BaseRepo
{
    function model()
    {
        return Brand::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function(Builder $q) use ($keyword) {
                return $q->where(Brand::$_name,'like',"%$keyword%")
                    ->orWhere(Brand::$_address,'like',"%$keyword%")
                    ->orWhere(Brand::$_email,'like',"%$keyword%")
                    ->orWhere(Brand::$_phone,'like',"%$keyword%")
                    ->orWhere(Brand::$_website,'like',"%$keyword%");
            });
        });

        $query = $query->where(Brand::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Brand::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Brand::$_status, array_keys(Config::STATUS))
            ->where(Brand::$_id, $id)
            ->first();
    }

    public function getSelectBrand() {
        $query = $this->query()->where(Brand::$_status,Config::ACTIVE);

        return $query->select(Brand::$_all)->get();
    }
}
