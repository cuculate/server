<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Repos\AgeRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\ProductRepo;
use Illuminate\Support\Arr;
use Support\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    private $product;
    private $brand;
    private $age;
    private $category;

    public function __construct(
        ProductRepo $product,
        BrandRepo $brand,
        AgeRepo $age,
        CategoryRepo $category)
    {
        parent::__construct();

        $this->product = $product;
        $this->brand = $brand;
        $this->age = $age;
        $this->category = $category;
    }

    public function Index()
    {
        $product = $this->product->getSelectProduct();
        $productRandom = $product->random(5);
        $productHots = $this->product->ProductHot();
        $productNews = $this->product->ProductNew();
        $productSales = $this->product->ProductSale();
        $categories = $this->category->getSelectParent();
        $brands = $this->brand->getSelectBrand();
        $ages = $this->age->getSelectAge();
        return view('frontend.Home', compact('productRandom',
            'productHots',
            'productNews',
            'productSales',
            'categories',
            'brands',
            'ages'));
    }
}
