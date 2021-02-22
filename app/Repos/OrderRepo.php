<?php

namespace App\Repos;

use App\General\Config;
use App\General\OrderConfig;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderRepo extends BaseRepo
{
    function model()
    {
        return Order::class;
    }

    public function search(array $relation = ['customer', 'payment'])
    {
        $query = $this->query()
            ->with($relation)
            ->orderBy(Order::$_status);

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';
        $payments = request()->has('payments') ? explode(',', request('payments')) : '';
        $customers = request()->has('customers') ? explode(',', request('customers')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Order::$_name, 'like', "%$keyword%");
            });
        })->with($relation)
            ->orderBy(Order::$_status);

        $query = $query->where(Order::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Order::$_status, $status);
        })->with($relation)
            ->orderBy(Order::$_status);

        $query = $query->when(!empty($payments), function (Builder $b) use ($payments) {
            return $b->whereIn(Order::$_payID, $payments);
        })->with($relation)
            ->orderBy(Order::$_status);

        $query = $query->when(!empty($customers), function (Builder $b) use ($customers) {
            return $b->whereIn(Order::$_customerID, $customers);
        })->with($relation)
            ->orderBy(Order::$_status);

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        $columns = [
            Order::$_id,
            Order::$_customerID,
            Order::$_status,
            Order::$_created,
            Order::$_updated,
            Order::$_name,
            Order::$_address,
            Order::$_phone,
            Order::$_areaID,
            Order::$_payID,
        ];

        return $this->query()
            ->whereIn(Order::$_status, array_keys(OrderConfig::STATUS))
            ->where(Order::$_id, $id)
            ->join(OrderDetail::$name, Order::$_id, OrderDetail::$_orderID)
            ->select(array_merge(
                [
                    DB::raw(sprintf('SUM(CAST(%s AS FLOAT)) AS total_price', OrderDetail::$_totalPrice)),
                ],
                $columns
            ))
            ->groupBy($columns)
            ->first();
    }

    public function BaseCustomersQuery(array $ids = [], array $status = [])
    {
        $query = $this->query();

        if (!empty($status)) $query = $query->whereIn(Order::$_status, $status);
        if (!empty($ids)) $query = $query->whereIn(Order::$_customerID, $ids);

        return $query;
    }

    /**
     * @param array $ids : customers ids
     * @param array $status : customers status
     * @param array $relation
     * @return Builder[]|Collection
     */
    public function GetOrdersByCustomers(array $ids, array $status, array $relation = ['area', 'payment'])
    {
        $columns = [
            Order::$_id,
            Order::$_customerID,
            Order::$_status,
            Order::$_created,
            Order::$_updated,
            Order::$_name,
            Order::$_address,
            Order::$_phone,
            Order::$_areaID,
            Order::$_payID,
        ];

        return $this->BaseCustomersQuery($ids, $status)
            ->with($relation)
            ->join(OrderDetail::$name, Order::$_id, OrderDetail::$_orderID)
            ->select(array_merge(
                [
                    DB::raw(sprintf('SUM(CAST(%s AS FLOAT)) AS total_price', OrderDetail::$_totalPrice)),
                ],
                $columns
            ))
            ->groupBy($columns)
            ->get();
    }

    public function listOrderCanDelete(array $ids)
    {
        return $this->query()
            ->whereIn(Order::$_id, $ids)
            ->whereIn(Order::$_status, [OrderConfig::WAITING, OrderConfig::PROCESSING])
            ->get();
    }
}
