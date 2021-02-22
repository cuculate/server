<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Customer\StoreRequest;
use App\Http\Requests\Backend\Customer\UpdateRequest;
use App\Models\Customer;
use App\Repos\AreaRepo;
use App\Repos\CustomerRepo;
use Support\Http\Controllers\BaseController;

class CustomerController extends BaseController
{
    private $base;
    private $area;

    public function __construct(
        CustomerRepo $base,
        AreaRepo $area)
    {
        parent::__construct();

        $this->base = $base;
        $this->area = $area;
    }

    public function Index()
    {
        try {
            $customer = $this->base->search();
            $area = $this->area->getSelectArea();

            return $this->response->Success([
                'customer' => $customer,
                'area'     => $area,
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Edit($id)
    {
        try {
            $customer = $this->base->findNotDelete($id);
            $area = $this->area->getSelectArea();
            if (!$customer) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'customer' => $customer,
                'area'     => $area,
                "msg"      => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Update(UpdateRequest $request, $id)
    {
        if (!$this->base->findNotDelete($id)) {
            return $this->response->NotFound();
        }
        return $this->response->Success([
            'customer' => $this->base->update($request->data(), $id),
            "msg"      => 'Thao tác thành công.']);
    }


    public function Delete($ids)
    {
        try {
            $ids = explode(',', $ids);
            if (count($ids) <= 0) {
                $this->response->BadRequest("Yêu cầu không hợp lệ");
            }

            $this->base->softDelete($ids, Customer::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
