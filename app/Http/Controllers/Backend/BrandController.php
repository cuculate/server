<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Brand\StoreRequest;
use App\Http\Requests\Backend\Brand\UpdateRequest;
use App\Models\Brand;
use App\Repos\BrandRepo;
use Support\Http\Controllers\BaseController;

class BrandController extends BaseController
{
    private $base;

    public function __construct(
        BrandRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            return $this->response->Success(['brand' => $this->base->search()]);
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
                    'brand' => $this->base->create($request->data()),
                    "msg"   => 'Thao tác thành công.']
            );
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Edit($id)
    {
        try {
            $brand = $this->base->findNotDelete($id);
            if (!$brand) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'brand' => $brand,
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
                'brand' => $this->base->update($request->data(), $id),
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

            $this->base->softDelete($ids, Brand::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
