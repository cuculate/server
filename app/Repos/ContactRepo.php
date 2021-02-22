<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;

class ContactRepo extends BaseRepo
{
    function model()
    {
        return Contact::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Contact::$_email, 'like', "%$keyword%")
                    ->orWhere(Contact::$_name, 'like', "%$keyword%")
                    ->orWhere(Contact::$_address, 'like', "%$keyword%")
                    ->orWhere(Contact::$_content, 'like', "%$keyword%")
                    ->orWhere(Contact::$_phone, 'like', "%$keyword%");
            });
        });

        $query = $query->where(Contact::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Contact::$_status, $status);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Contact::$_status, array_keys(Config::STATUS))
            ->where(Contact::$_id, $id)
            ->first();
    }
}
