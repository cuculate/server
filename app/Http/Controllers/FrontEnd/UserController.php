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

class UserController extends BaseController
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
        $categories = $this->category->getSelectParent();
        $brands = $this->brand->getSelectBrand();
        $ages = $this->age->getSelectAge();
        $area = $user->area;
        return view('frontend.user.profile', compact('user',
            'area',
            'categories',
            'brands',
            'ages'));
    }

    public function EditProfile($id)
    {
        try {
            if (!$this->customer->findNotDelete($id)) {
                return abort(404);
            }
            $user = $this->customer->findNotDelete($id);
            $areas = $this->area->getSelectArea();
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.user.edit', compact('user',
                'areas',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function UpdateProfile(UpdateRequest $request, $id)
    {
        $user = $this->customer->findNotDelete($id);
        if (!$user) {
            return abort(404);
        }
        if (Hash::check($request['mkKh'], $user->mkKh)) {
            $this->customer->update($request->data(), $id);
            return redirect()->route('profile', $id)->with('success', 'Cập nhật thành công');
        } else {
            return back()->with('error', 'Mật khẩu sai!');
        }
    }

    public function ChangePassword($id)
    {
        try {
            if (!$this->customer->findNotDelete($id)) {
                return abort(404);
            }
            $user = $this->customer->findNotDelete($id);
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.user.change-password', compact('user',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function UpdatePassword(ChangePasswordRequest $request, $id)
    {
            $user = $this->customer->findNotDelete($id);
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            if (!$this->customer->findNotDelete($id)) {
                return abort(404);
            }
            if (Hash::check($request->data()['old-password'], $user->password)) {
                if ($request->data()['re-password'] === $request->data()['password']) {
                    $password = Hash::make($request->data()['password']);
                    $this->customer->update(['password' => $password], $id);
                    return redirect()->route('profile', $id)->with('success', 'Cập nhật thành công');
                }
                return back()->with('error', 'Mật khẩu mới không trùng khớp!');
            } else {
                return back()->with('error', 'Mật khẩu sai!');
            }
    }

    public function ForgotPassword()
    {
        try {
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.user.forgot-password', compact('categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function SendMail(ForgotPasswordRequest $request)
    {
        try {
            if (!$user = $this->customer->findEmail($request->data()['email'])) {
                return back()->with('error', 'Email không tồn tại!');
            }
            $details = [

                'greeting' => 'Hi Artisan',

                'body' => 'This is my first notification from ItSolutionStuff.com',

                'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',

                'actionText' => 'View My Site',

                'actionURL' => url('/'),

                'order_id' => 101

            ];
            Notification::route('mail', $user->email)->notify(new ResetPassword($user));

            return redirect()->route('login')->with('success', 'Gủi mail thành công');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function ResetPassword($id)
    {
        try {
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.user.reset-password', compact('id',
                'categories',
                'brands',
                'ages'
            ));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function UpdateResetPassword(ResetPasswordRequest $request, $id)
    {
        try {
            if (!$this->customer->findNotDelete($id)) {
                return abort(404);
            }
            if ($request->data()['re-mkKh'] === $request->data()['mkKh']) {
                $password = Hash::make($request->data()['mkKh']);
                $this->customer->update(['mkKh' => $password], $id);
                return redirect()->route('login')->with('success', 'Cập nhật thành công');
            }
            return redirect()->route('login')->with('error', 'Mật khẩu mới không trùng khớp!');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }
}
