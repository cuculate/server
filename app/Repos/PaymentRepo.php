<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Age;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;

class PaymentRepo extends BaseRepo
{
    function model()
    {
        return Payment::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function(Builder $q) use ($keyword) {
                return $q->where(Payment::$_name,'like',"%$keyword%");
            });
        });

        $query = $query->where(Payment::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Payment::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Payment::$_status, array_keys(Config::STATUS))
            ->where(Payment::$_id, $id)
            ->first();
    }
    public function getSelectPay()
    {
        $query = $this->query()->where(Payment::$_status,Config::ACTIVE);

        return $query->select(Payment::$_all)->get();
    }
}
