<?php

namespace App\Repos;

use App\General\Config;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepo extends BaseRepo
{
    function model()
    {
        return Product::class;
    }

    public function search()
    {
        $query = $this->query();

        $keyword = request('keyword') ?? '';
        $status = request()->has('status') ? explode(',', request('status')) : '';
        $categories = request()->has('categories') ? explode(',', request('categories')) : '';
        $brands = request()->has('brands') ? explode(',', request('brands')) : '';
        $ages = request()->has('ages') ? explode(',', request('ages')) : '';
        $sale = request()->has('sale') ? explode(',', request('sale')) : '';
        $new = request()->has('new') ? explode(',', request('new')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Product::$_name, 'like', "%$keyword%")
                    ->orWhere(Product::$_price, 'like', "%$keyword%");
            });
        });

        $query = $query->where(Product::$_status, '!=', Config::DELETED);

        $query = $query->when(!empty($status), function (Builder $b) use ($status) {
            return $b->whereIn(Product::$_status, $status);
        });

        $query = $query->when(!empty($categories), function (Builder $b) use ($categories) {
            return $b->whereIn(Product::$_categoryID, $categories);
        });

        $query = $query->when(!empty($brands), function (Builder $b) use ($brands) {
            return $b->whereIn(Product::$_brandID, $brands);
        });

        $query = $query->when(!empty($ages), function (Builder $b) use ($ages) {
            return $b->whereIn(Product::$_ageID, $ages);
        });

        $query = $query->when(!empty($sale), function (Builder $b) use ($sale) {
            return $b->whereIn(Product::$_sale, $sale);
        });

        $query = $query->when(!empty($new), function (Builder $b) use ($new) {
            return $b->whereIn(Product::$_new, $new);
        });

        return $this->pagination($query);
    }

    public function findNotDelete($id)
    {
        return $this->query()
            ->where(Product::$_id, $id)
            ->whereIn(Product::$_status, array_keys(Config::STATUS))
            ->first();
    }

    public function findActive($id)
    {
        return $this->query()
            ->where(Product::$_id, $id)
            ->where(Product::$_status, Config::ACTIVE)
            ->first();
    }

    public function getSelectProduct()
    {
        $query = $this->query()->where(Product::$_status, Config::ACTIVE);

        return $query->select(Product::$_all)->get();
    }

    public function countNew()
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->where(Product::$_new, '1')
            ->count();
    }

    public function countSale()
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->where(Product::$_sale, '1')
            ->count();
    }

    public function ProductHot()
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->orderBy(Product::$_solded, 'desc')
            ->paginate(25);
    }

    public function ProductNew()
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->where(Product::$_new, Config::ACTIVE)
            ->orderBy(Product::$_created, 'desc')
            ->paginate(25);
    }

    public function ProductSale()
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->where(Product::$_sale, Config::ACTIVE)
            ->paginate(25);
    }

    public function homeSearch()
    {
        $query = $this->query()->where(Product::$_status, Config::ACTIVE);

        $keyword = request('search') ?? '';
        $category = request()->has('product-cate') ? explode(',', request('product-cate')) : '';
        $brand = request()->has('brands') ? explode(',', request('brands')) : '';
        $age = request()->has('ages') ? explode(',', request('ages')) : '';

        $query = $query->when(!empty($keyword), function (Builder $b) use ($keyword) {
            return $b->where(function (Builder $q) use ($keyword) {
                return $q->where(Product::$_name, 'like', "%$keyword%");
            });
        });


        $query = $query->when(!empty($category), function (Builder $b) use ($category) {
            if ($category[0] > 0) {
                $categoryIds = Category::where('parent_id', $category)
                    ->pluck('id')
                    ->push($category)
                    ->all();
                return $b->whereIn(Product::$_categoryID, $categoryIds);
            } else {

                return $b;
            }
        });

        $query = $query->when(!empty($brand), function (Builder $b) use ($brand) {
            return $b->whereIn(Product::$_brandID, $brand);
        });

        $query = $query->when(!empty($age), function (Builder $b) use ($age) {
            return $b->whereIn(Product::$_ageID, $age);
        });

        return $this->pagination($query,15);
    }

    public function findNotSold($id)
    {
        return $query = $this->query()->where(Product::$_id, $id)
            ->where(Product::$_status, Config::ACTIVE)
            ->where(Product::$_stocked, '>', 0)
            ->first();
    }

    public function random($number)
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->inRandomOrder()
            ->limit($number)
            ->get();
    }

    public function relatedProducts($category, $brand, $age)
    {
        return $this->query()
            ->where(Product::$_status, Config::ACTIVE)
            ->where(function($query) use ($category, $brand, $age){
                $query->orWhere(Product::$_categoryID, $category)
                    ->orWhere(Product::$_brandID, $brand)
                    ->orWhere(Product::$_ageID, $age);
            })
            ->inRandomOrder()
            ->limit(15)
            ->get();
    }
}
