<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Customer\ChangePasswordRequest;
use App\Http\Requests\Frontend\Customer\ForgotPasswordRequest;
use App\Http\Requests\Frontend\Customer\ResetPasswordRequest;
use App\Http\Requests\Frontend\Customer\UpdateRequest;
use App\Models\Category;
use App\Notifications\ResetPassword;
use App\Repos\AgeRepo;
use App\Repos\AreaRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\CustomerRepo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Support\Http\Controllers\BaseController;

class PostController extends BaseController
{
    private $area;
    private $customer;
    private $brand;
    private $age;
    private $category;

    public function __construct(
        AreaRepo $area,
        CustomerRepo $customer,
        BrandRepo $brand,
        AgeRepo $age,
        CategoryRepo $category)
    {
        parent::__construct();

        $this->area = $area;
        $this->customer = $customer;
        $this->brand = $brand;
        $this->age = $age;
        $this->category = $category;

    }

    public function Profile($id)
    {
        if (!$user = $this->customer->findNotDelete($id)) {
            return abort(404);
        }

        $area = $user->area;
        return view('frontend.user.profile', compact('user', 'area'));
    }

    public function Post($post)
    {
        $categories = $this->category->getSelectParent();
        $brands = $this->brand->getSelectBrand();
        $ages = $this->age->getSelectAge();
        switch ($post) {
            case "be-yeu":
                return view('frontend/post/beyeu', compact('categories', 'brands', 'ages'));
                break;
            case "chinh-sach":
                return view('frontend/post/chinhsachbm', compact('categories', 'brands', 'ages'));
                break;
            case "doi-tra-hang":
                return view('frontend/post/doitrahang', compact('categories', 'brands', 'ages'));
                break;
            case "faq":
                return view('frontend/post/faq', compact('categories', 'brands', 'ages'));
                break;
            case "huong-dan":
                return view('frontend/post/huongdan', compact('categories', 'brands', 'ages'));
                break;
            case "lien-he":
                return view('frontend/post/lienhe', compact('categories', 'brands', 'ages'));
                break;
            case "thanh-toan":
                return view('frontend/post/thanhtoan', compact('categories', 'brands', 'ages'));
                break;
            case "tra-hang":
                return view('frontend/post/trahang', compact('categories', 'brands', 'ages'));
                break;
        }
    }


}
