<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests\Frontend\Auth\BaseRequest;
use App\Http\Requests\Frontend\Customer\StoreRequest;
use App\Models\Category;
use App\Repos\AdminRepo;
use App\Repos\AgeRepo;
use App\Repos\AreaRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\CustomerRepo;
use Illuminate\Support\Facades\Hash;
use Support\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    private $area, $category, $customer, $admin, $brand, $age;

    public function __construct(
        AreaRepo $area,
        CustomerRepo $customer,
        AdminRepo $admin,
        BrandRepo $brand,
        AgeRepo $age,
        CategoryRepo $category
    ) {
        parent::__construct();

        $this->area = $area;
        $this->customer = $customer;
        $this->admin = $admin;
        $this->brand = $brand;
        $this->age = $age;
        $this->category = $category;
    }

    public function Login()
    {
        $categories = $this->category->getSelectParent();
        $brands = $this->brand->getSelectBrand();
        $ages = $this->age->getSelectAge();
        return view('frontend.login', compact('categories', 'brands', 'ages'));
    }

    public function Logout()
    {
        try {
            session()->forget('User');
            return redirect()->route('home');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Auth(BaseRequest $request)
    {
        try {
            $user = $this->customer->findAccount($request['account']);
            if (!$user) {
                return redirect()->route('login')->with('error', 'Tài khoản không tồn tại!');
            }

            if (!Hash::check($request['password'], $user->password)) {
                return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu sai!');
            }

            $request->session()->put('User', $user);

            return redirect()->route('home');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Register()
    {
        try {
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            $areas = $this->area->getSelectArea();

            return view('frontend.register', compact('areas','categories', 'brands', 'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }


    public function Store(StoreRequest $request)
    {
        try {
            $this->customer->create($request->data());

            return redirect()->route('login')->with('success', 'Đăng ký thành công');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }
}
