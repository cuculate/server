<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Auth\BaseRequest;
use App\Repos\AdminRepo;
use Support\Http\Controllers\BaseController;

class LoginController extends BaseController
{
    private $admin;

    public function __construct(AdminRepo $admin)
    {
        parent::__construct();

        $this->admin = $admin;

        $this->middleware('auth:api', ['except' => ['Login', 'Auth']]);
    }

    public function Admin()
    {
        return redirect('http://localhost:8080/');
    }

    public function Login()
    {
        return redirect('http://localhost:8080/login');
    }

    public function Auth(BaseRequest $request)
    {
        $admin = $this->admin->findEmail($request['email']);
        if (!$admin) {
            return $this->response->NotFound('Tài khoản không tồn tại!');
        } elseif (!$token = auth()->attempt(array('email' => $request->data()['email'], 'password' => $request->data()['password']))) {
            return $this->response->Unauthorized('Sai tài khoản hoặc mật khẩu!');
        }
        return $this->createNewToken($token);
    }

    public function Logout()
    {
        try {
            auth()->logout();

            return $this->response->Success(["msg" => 'Đăng xuất thành công!']);
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token)
    {
        return $this->response->Success(['access_token' => $token,
                                         'token_type'   => 'bearer',
                                         'user'         => auth()->user(),
                                         "msg"          => 'Thao tác thành công.']);
    }

}
