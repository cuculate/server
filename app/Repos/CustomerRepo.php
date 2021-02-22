<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class CustomerRepo extends BaseRepo
{
    function model()
    {
        return Customer::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';
        $genders = request()->has('genders') ? explode(',', request('genders')) : '';
        $areas = request()->has('areas') ? explode(',', request('areas')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function(Builder $q) use ($keyword) {
                return $q->where(Customer::$_account,'like',"%$keyword%")
                    ->orWhere(Customer::$_name,'like',"%$keyword%")
                    ->orWhere(Customer::$_address,'like',"%$keyword%")
                    ->orWhere(Customer::$_email,'like',"%$keyword%");
            });
        });

        $query = $query->where(Customer::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Customer::$_status, $status);
        });

        $query = $query->when(!empty($genders), function (Builder $b) use ($genders) {
            return $b->whereIn(Customer::$_gender, $genders);
        });

        $query = $query->when(!empty($areas), function (Builder $b) use ($areas) {
            return $b->whereIn(Customer::$_areaID, $areas);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Customer::$_status, array_keys(Config::STATUS))
            ->where(Customer::$_id, $id)
            ->first();
    }

    public function getSelectCustomer()
    {
        $query = $this->query()->where(Customer::$_status,Config::ACTIVE);

        return $query->select(Customer::$_all)->get();
    }

    public function findAccount($account)
    {
        return $this->query()
            ->where(Customer::$_account,$account)
            ->where(Customer::$_status,Config::ACTIVE)
            ->first();
    }
    public function findEmail($email)
    {
        return $this->query()
            ->where(Customer::$_email,$email)
            ->where(Customer::$_status,Config::ACTIVE)
            ->first();
    }
}
