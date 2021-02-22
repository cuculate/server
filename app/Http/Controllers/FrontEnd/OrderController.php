<?php

namespace App\Http\Controllers\Frontend;

use App\General\OrderConfig;
use App\Models\Category;
use App\Models\Order;
use App\Notifications\OrderCancel;
use App\Repos\AgeRepo;
use App\Repos\AreaRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\CustomerRepo;
use App\Repos\OrderDetailRepo;
use App\Repos\OrderRepo;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Support\Http\Controllers\BaseController;

class OrderController extends BaseController
{
    private $customer;
    private $order;
    private $orderDetail;
    private $area;
    private $brand;
    private $age;
    private $category;

    public function __construct(
        OrderRepo $order,
        OrderDetailRepo $orderDetail,
        CustomerRepo $customer,
        AreaRepo $area,
        CategoryRepo $category,
        BrandRepo $brand,
        AgeRepo $age)
    {
        parent::__construct();

        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->customer = $customer;
        $this->area = $area;
        $this->brand = $brand;
        $this->age = $age;
        $this->category = $category;

    }

    public function ListOrder($id)
    {
        try {
            if (!$this->customer->findNotDelete($id)) {
                return abort(404);
            }
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            $orderWait = $this->order->GetOrdersByCustomers([$id], [OrderConfig::WAITING]);
            $orderProcess = $this->order->GetOrdersByCustomers([$id], [OrderConfig::PROCESSING]);
            $orderTransport = $this->order->GetOrdersByCustomers([$id], [OrderConfig::TRANSPORTING]);
            $orderCompleted = $this->order->GetOrdersByCustomers([$id], [OrderConfig::COMPLETED]);
            $orderRefund = $this->order->GetOrdersByCustomers([$id], [OrderConfig::REFUNDING]);
            $orderCanceled = $this->order->GetOrdersByCustomers([$id], [OrderConfig::CANCELED]);

            return view('frontend.user.order', compact('orderWait',
                'orderProcess',
                'orderTransport',
                'orderCompleted',
                'orderRefund',
                'orderCanceled',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }

    }

    public function Show($id)
    {
        try {
            if (!$order = $this->order->findNotDelete($id)) {
                return abort(404);
            }
            $payment = $order->payment;
            $area = $order->area;
            $detail = $order->orderDetail;
            $categories = $this->category->getSelectParent();
            $brands = $this->brand->getSelectBrand();
            $ages = $this->age->getSelectAge();
            return view('frontend.user.order-show', compact('order',
                'payment',
                'area',
                'detail',
                'categories',
                'brands',
                'ages'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Delete($ids)
    {

        $ids = explode(',', $ids);
        $orders = $this->order->listOrderCanDelete($ids);
        if (count($ids) <= 0 && count($orders) <= 0) {
            return abort(404);
        } else {
            $this->order->softDelete($ids, Order::$_status);
            $customer = Session::get('User');
            Notification::route('mail', $customer->email)->notify(new OrderCancel($orders, $customer));
            return redirect()->route('list-order', Session::get('User')->id);
        }


    }
}
