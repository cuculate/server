<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;

class AdminRepo extends BaseRepo
{
    function model()
    {
        return Admin::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Admin::$_account, 'like', "%$keyword%");
            });
        });
        $query = $query->where(Admin::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Admin::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Admin::$_status, array_keys(Config::STATUS))
            ->where(Admin::$_id, $id)
            ->first();
    }

    public function findEmail($email)
    {
        return $this->query()
            ->where(Admin::$_status,Config::ACTIVE)
            ->where(Admin::$_email, $email)
            ->first();
    }

}
