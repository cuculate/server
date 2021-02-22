<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Age\StoreRequest;
use App\Http\Requests\Backend\Age\UpdateRequest;
use App\Models\Age;
use App\Repos\AgeRepo;
use Support\Http\Controllers\BaseController;

class AgeController extends BaseController
{
    private $base;

    public function __construct(AgeRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            return $this->response->Success(['age' => $this->base->search()]);
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
                'age' => $this->base->create($request->data()),
                "msg" => 'Thao tác thành công.'
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Edit($id)
    {
        try {
            $age = $this->base->findNotDelete($id);
            if (!$age) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'age' => $age,
                "msg" => 'Thao tác thành công.'
            ]);
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
                'age' => $this->base->update($request->data(), $id),
                "msg" => 'Thao tác thành công.']);
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

            $this->base->softDelete($ids, Age::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
