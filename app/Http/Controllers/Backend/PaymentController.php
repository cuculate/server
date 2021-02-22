<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Payment\StoreRequest;
use App\Http\Requests\Backend\Payment\UpdateRequest;
use App\Models\Payment;
use App\Repos\PaymentRepo;
use Support\Http\Controllers\BaseController;

class PaymentController extends BaseController
{
    private $base;

    public function __construct(
        PaymentRepo $base)
    {
        parent::__construct();

        $this->base = $base;
    }

    public function Index()
    {
        try {
            return $this->response->Success(['payment' => $this->base->search()]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Create()
    {
        try {
            return $this->response->Success(["msg"     => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Store(StoreRequest $request)
    {
        try {
            return $this->response->Success(['payment' => $this->base->create($request->data()),
                                             "msg"     => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Edit($id)
    {
        try {
            $payment = $this->base->findNotDelete($id);
            if (!$payment) {
                return $this->response->NotFound();
            }

            return $this->response->Success([
                'payment'  => $payment,
                "msg"      => 'Thao tác thành công.']);
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
                'payment' => $this->base->update($request->data(), $id),
                "msg"     => 'Thao tác thành công.']);
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

            $this->base->softDelete($ids, Payment::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
