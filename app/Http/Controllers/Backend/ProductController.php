<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Product\StoreRequest;
use App\Http\Requests\Backend\Product\UpdateRequest;
use App\Models\Product;
use App\Repos\AgeRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\ProductRepo;
use Support\Http\Controllers\BaseController;

class ProductController extends BaseController
{
    private $base;
    private $category;
    private $age;
    private $brand;

    public function __construct(
        ProductRepo $base,
        CategoryRepo $category,
        AgeRepo $age,
        BrandRepo $brand)
    {
        parent::__construct();

        $this->base = $base;
        $this->category = $category;
        $this->age = $age;
        $this->brand = $brand;
    }

    public function Index()
    {
        try {
            $products = $this->base->search();
            $category = $this->category->getSelectCategory();
            $brand = $this->brand->getSelectBrand();
            $age = $this->age->getSelectAge();

            return $this->response->Success([
                'products' => $products,
                'category' => $category,
                'brand'    => $brand,
                'age'      => $age
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Create()
    {
        try {
            $category = $this->category->getSelectCategory();
            $brand = $this->brand->getSelectBrand();
            $age = $this->age->getSelectAge();

            return $this->response->Success([
                'category' => $category,
                'brand'    => $brand,
                'age'      => $age]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Store(StoreRequest $request)
    {

        return $this->response->Success([
            'product' => $this->base->create($request->data()),
            "msg"     => 'Thao tác thành công.'
        ]);
    }

    public function Edit($id)
    {
        try {
            $product = $this->base->findNotDelete($id);
            $category = $this->category->getSelectCategory();
            $brand = $this->brand->getSelectBrand();
            $age = $this->age->getSelectAge();
            if (!$product) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'product'  => $product,
                'category' => $category,
                'brand'    => $brand,
                'age'      => $age,
                "msg"      => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Update(UpdateRequest $request, $id)
    {
        try {
            if (!$this->base->findNotDelete($id)) {
                return $this->response->NotFound();
            }

            $product = $this->base->update($request->data(), $id);
            return $this->response->Success([
                'product' => $product,
                "msg"     => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }


    public function Delete($ids)
    {
        try {
            $ids = explode(',', $ids);
            if (count($ids) <= 0) {
                $this->response->BadRequest("Yêu cầu không hợp lệ");
            }

            $this->base->softDelete($ids, Product::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
