<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;

class FeedbackRepo extends BaseRepo
{
    function model()
    {
        return Feedback::class;
    }

    public function search(array $relation = ['product'])
    {
        $query = $this->query()->with($relation);

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';
        $products = request()->has('products') ? explode(',', request('products')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Feedback::$_name, 'like', "%$keyword%")
                    ->orWhere(Feedback::$_content, 'like', "%$keyword%")
                    ->orWhere(Feedback::$_title, 'like', "%$keyword%");
            });
        })->with($relation);


        $query = $query->where(Feedback::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Feedback::$_status, $status);
        })->with($relation);

        $query = $query->when(!empty($products), function (Builder $b) use ($products) {
            return $b->whereIn(Feedback::$_productID, $products);
        })->with($relation);


        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->whereIn(Feedback::$_status, array_keys(Config::STATUS))
            ->where(Feedback::$_id, $id)
            ->first();
    }
}
