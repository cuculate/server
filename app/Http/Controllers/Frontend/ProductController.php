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
        $products = $this->product->homeSearch();
        $productRandoms = $this->product->random(4);
        $categories = $this->category->getSelectParent();
        $brands = $this->brand->getSelectBrand();
        $ages = $this->age->getSelectAge();
        return view('frontend.product.search', compact('products', 'productRandoms',
            'categories',
            'brands',
            'ages'));
    }

    public function HotProduct()
    {
        try {
            $products = $this->product->ProductHot();
            $productRandoms = $this->product->random(4);
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.hot', compact('products', 'productRandoms',
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
            $productRandoms = $this->product->random(4);
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.new', compact('products','productRandoms',
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
            $productRandoms = $this->product->random(4);
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.product.sale', compact('products','productRandoms',
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
            $productRandoms = $this->product->random(4);
            $category = $product->category;
            $brand = $product->brand;
            $age = $product->age;
            $feedbacks = $product->feedback;
            $avgStar = $this->avgStar($feedbacks);
            $areas = $this->area->getSelectArea();
            $relatedProducts = $this->product->relatedProducts($product->category_id, $product->brand_id, $product->age_id);
            return view('frontend.product.show', compact('product',
                'productRandoms',
                'category',
                'brand',
                'age',
                'feedbacks',
                'areas',
                'categories',
                'brands',
                'avgStar',
                'relatedProducts',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function avgStar($feedbacks)
    {
        $sumStar = 0;
        $count = count($feedbacks);
        if ($count == 0) {
            return 0;
        }
        foreach ($feedbacks as $feedback) {
            $sumStar += $feedback->star;
        }
        return $sumStar / $count;
    }
}
