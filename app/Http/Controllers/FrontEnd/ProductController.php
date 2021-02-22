<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Repos\AgeRepo;
use App\Repos\AreaRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\FeedbackRepo;
use App\Repos\ProductRepo;
use Support\Http\Controllers\BaseController;

class ProductController extends BaseController
{
    private $product;
    private $brand;
    private $age;
    private $area;
    private $feedback;
    private $category;

    public function __construct(
        ProductRepo $product,
        BrandRepo $brand,
        AgeRepo $age,
        AreaRepo $area,
        FeedbackRepo $feedback,
        CategoryRepo $category)
    {
        parent::__construct();

        $this->product = $product;
        $this->brand = $brand;
        $this->age = $age;
        $this->area = $area;
        $this->feedback = $feedback;
        $this->category = $category;
    }

    public function Search()
    {
        try {
            $products = $this->product->homeSearch();
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.search', compact('products',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function HotProduct()
    {
        try {
            $products = $this->product->ProductHot();
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.hot', compact('products',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function NewProduct()
    {
        try {
            $products = $this->product->ProductNew();
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.new', compact('products',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function SaleProduct()
    {
        try {
            $products = $this->product->ProductSale();
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.sale', compact('products',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Show($id)
    {
        try {
            if (!$product = $this->product->findActive($id)) {
                return abort(404);
            }

            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            $product = $this->product->findActive($id);
            $productRandoms = $this->product->getSelectProduct()->random(12);
            $category = $product->category;
            $brand = $product->brand;
            $age = $product->age;
            $feedbacks = $product->feedback;
            $areas = $this->area->getSelectArea();
            return view('frontend.product.show', compact('product',
                'productRandoms',
                'category',
                'brand',
                'age',
                'feedbacks',
                'areas',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }
}
