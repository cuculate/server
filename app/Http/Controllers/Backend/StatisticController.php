<?php

namespace App\Http\Controllers\Backend;

use App\General\Config;
use App\General\OrderConfig;
use App\Repos\AdminRepo;
use App\Repos\AgeRepo;
use App\Repos\AreaRepo;
use App\Repos\BrandRepo;
use App\Repos\CategoryRepo;
use App\Repos\CustomerRepo;
use App\Repos\FeedbackRepo;
use App\Repos\OrderRepo;
use App\Repos\PaymentRepo;
use App\Repos\ProductRepo;
use Support\Http\Controllers\BaseController;

class StatisticController extends BaseController
{
    private $feedback;
    private $product;
    private $admin;
    private $age;
    private $area;
    private $brand;
    private $category;
    private $customer;
    private $order;
    private $payment;

    public function __construct(
        AdminRepo $admin,
        AgeRepo $age,
        AreaRepo $area,
        BrandRepo $brand,
        CategoryRepo $category,
        CustomerRepo $customer,
        FeedbackRepo $feedback,
        OrderRepo $order,
        PaymentRepo $payment,
        ProductRepo $product)
    {
        parent::__construct();

        $this->admin = $admin;
        $this->age = $age;
        $this->area = $area;
        $this->brand = $brand;
        $this->category = $category;
        $this->customer = $customer;
        $this->feedback = $feedback;
        $this->order = $order;
        $this->payment = $payment;
        $this->product = $product;
    }

    public function Index()
    {
        try {
            $productNew = $this->product->countNew();
            $productSale = $this->product->countSale();

            return $this->response->Success([
                'adminActive'    =>  $this->admin->countByStatus([Config::ACTIVE]),
                'adminBlock'     => $this->admin->countByStatus([Config::BLOCKED]),
                'ageActive'      => $this->age->countByStatus([Config::ACTIVE]),
                'ageBlock'       => $this->age->countByStatus([Config::BLOCKED]),
                'areaActive'     => $this->area->countByStatus([Config::ACTIVE]),
                'areaBlock'      => $this->area->countByStatus([Config::BLOCKED]),
                'brandActive'    => $this->brand->countByStatus([Config::ACTIVE]),
                'brandBlock'     => $this->brand->countByStatus([Config::BLOCKED]),
                'categoryActive' => $this->category->countByStatus([Config::ACTIVE]),
                'categoryBlock'  => $this->category->countByStatus([Config::BLOCKED]),
                'customerActive' => $this->customer->countByStatus([Config::ACTIVE]),
                'customerBlock'  => $this->customer->countByStatus([Config::BLOCKED]),
                'feedbackActive' => $this->feedback->countByStatus([Config::ACTIVE]),
                'feedbackDelete' => $this->feedback->countByStatus([Config::DELETED]),
                'listOrderWaits' => $this->order->GetOrdersByCustomers( [], [OrderConfig::WAITING]),
                'orderWait'      => $this->order->countByStatus([OrderConfig::WAITING]),
                'orderProcess'   => $this->order->countByStatus([OrderConfig::PROCESSING]),
                'orderTransport' => $this->order->countByStatus([OrderConfig::TRANSPORTING]),
                'orderDone'      => $this->order->countByStatus([OrderConfig::COMPLETED]),
                '$orderRefund'   => $this->order->countByStatus([OrderConfig::REFUNDING]),
                'paymentActive'  => $this->payment->countByStatus([Config::ACTIVE]),
                'paymentBlock'   => $this->payment->countByStatus([Config::BLOCKED]),
                'productActive'  => $this->product->countByStatus([Config::ACTIVE]),
                'productBlock'   => $this->product->countByStatus([Config::BLOCKED]),
                'productNew'     => $productNew,
                'productSale'    => $productSale,

            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }

}
