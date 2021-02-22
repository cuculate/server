<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Admin\StoreRequest;
use App\Http\Requests\Backend\Admin\UpdateRequest;
use App\Models\Admin;
use App\Repos\AdminRepo;
use Support\Http\Controllers\BaseController;

class AdminController extends BaseController
{
    private $base;

    public function __construct(
        AdminRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            $admin = $this->base->search();

            return $this->response->Success(['admin' => $admin]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Create()
    {
        try {
            return $this->response->Success(["msg" => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Store(StoreRequest $request)
    {
        try {
            return $this->response->Success([
                'admin' => $this->base->create($request->data()),
                "msg"   => 'Thao tác thành công.'
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Edit($id)
    {
        try {
            $admin = $this->base->findNotDelete($id);
            if (!$admin) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'admin' => $admin,
                "msg"   => 'Thao tác thành công.']);
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
            return $this->response->Success([
                'admin' => $this->base->update($request->data(), $id),
                "msg"   => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Delete($ids)
    {
        try {
            $ids = explode(',', $ids);
            if (count($ids) <= 0) {
                $this->response->BadRequest("Yêu cầu không hợp lệ");
            }

            $this->base->softDelete($ids, Admin::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
