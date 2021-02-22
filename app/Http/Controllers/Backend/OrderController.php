<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Order\UpdateRequest;
use App\Models\Order;
use App\Notifications\OrderStatus;
use App\Repos\CustomerRepo;
use App\Repos\OrderRepo;
use App\Repos\PaymentRepo;
use Illuminate\Support\Facades\Notification;
use Support\Http\Controllers\BaseController;

class OrderController extends BaseController
{
    private $base;
    private $payment;
    private $customer;

    public function __construct(
        OrderRepo $base,
        PaymentRepo $payment,
        CustomerRepo $customer)
    {
        parent::__construct();

        $this->base = $base;
        $this->payment = $payment;
        $this->customer = $customer;

    }

    public function Index()
    {
        try {
            $order = $this->base->search();
            $payment = $this->payment->getSelectPay();
            $customer = $this->customer->getSelectCustomer();

            return $this->response->Success(['order'    => $order,
                                             'payment'  => $payment,
                                             'customer' => $customer]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Show($id)
    {
        try {
            if (!$order = $this->base->findNotDelete($id)) {
                return $this->response->NotFound();
            }
            $payment = $order->payment;
            $area = $order->area;
            $customer = $order->customer;
            $detail = $order->orderDetail;

            return $this->response->Success([
                'order' => $order,
                "msg"   => 'Thao tác thành công.']);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }


    public function Update(UpdateRequest $request, $id)
    {
        try {
            if (!$order = $this->base->findNotDelete($id)) {
                return $this->response->NotFound();
            }
            $customer = $order->customer;
            $order->status = $request->status;
            $order->updated_at = now();
            $order->save();
            Notification::route('mail', $customer->email)->notify(new OrderStatus($order, $customer));
            return $this->response->Success([
                'order' => $order,
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
            $this->base->softDelete($ids, Order::$_status);

            return $this->response->Success(["msg" => 'Thao tác thành công']);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
