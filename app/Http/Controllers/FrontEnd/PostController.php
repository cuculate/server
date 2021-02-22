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

    public function __construct(
        AreaRepo $area,
        CustomerRepo $customer,
        BrandRepo $brand,
        AgeRepo $age)
    {
        parent::__construct();

        $this->area = $area;
        $this->customer = $customer;
        $this->brand = $brand;
        $this->age = $age;

    }

    public function Profile($id)
    {
        if (!$user = $this->customer->findNotDelete($id)) {
            return abort(404);
        }

        $area = $user->area;
        return view('frontend.user.profile', compact('user', 'area'));
    }


}
