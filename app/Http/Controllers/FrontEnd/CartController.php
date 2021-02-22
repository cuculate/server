<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Order\StoreRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Notifications\OrderStatus;
use App\Repos\AreaRepo;
use App\Repos\OrderRepo;
use App\Repos\PaymentRepo;
use App\Repos\ProductRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Support\Http\Controllers\BaseController;

class CartController extends BaseController
{
    private $product;
    private $area;
    private $payment;
    private $order;

    public function __construct(ProductRepo $product,
                                AreaRepo $area,
                                PaymentRepo $payment,
                                OrderRepo $order)
    {
        parent::__construct();

        $this->product = $product;
        $this->area = $area;
        $this->payment = $payment;
        $this->order = $order;
    }

    public function Index()
    {
        try {
            return view('frontend.cart.cart');
        } catch (\Exception $ex) {
            return abort(500);
        }

    }

    public function AddCart(Request $request, $id)
    {
        try {
            if (!$product = $this->product->findNotSold($id)) {
                return abort(404);
            }
            $brand = $product->brand;
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $request->session()->put('Cart', $newCart);
            return view('frontend.base.partials.cart');
        } catch (\Exception $ex) {
            return abort(500);
        }

    }

    public function DeleteItemCart(Request $request, $id)
    {
        try {
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if (count($newCart->products) > 0) {
                $request->session()->put('Cart', $newCart);
            } else {
                $request->session()->forget("Cart");
            }
            return view('frontend.base.partials.cart');
        } catch (\Exception $ex) {
            return abort(500);
        }

    }

    public function ChangeQuanty(Request $request, $id, $quanty)
    {
        try {
            if (!$product = $this->product->findNotSold($id)) {
                return abort(404);
            }

            $brand = $product->brand;
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->changeQuanty($product, $id, $quanty);
            $request->session()->put('Cart', $newCart);
            return view('frontend.base.partials.cart');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Purchase()
    {
        try {
            $areas = $this->area->getSelectArea();
            $payments = $this->payment->getSelectPay();
            return view('frontend.cart.purchase', compact('areas', 'payments'));
        } catch (\Exception $ex) {
            return abort(500);
        }
    }

    public function Order(StoreRequest $request)
    {
        $order = $this->order->create($request->data());
        $carts = $request->data()['products'];
        foreach ($carts as $cart) {
            $product = $this->product->findActive($cart['productInfo']->id);
            $product->stocked -= $cart['quanty'];
            $product->solded += $cart['quanty'];
            $product->save();
            $order->orderDetail()->attach($cart['productInfo']->id, [
                'quantity' => $cart['quanty'],
                'total_price'   => $cart['price']]);
        }
        $order->status = 1;
        $customer = $order->customer;
        Notification::route('mail', $customer->email)->notify(new OrderStatus($order,$customer));
        $request->session()->forget("Cart");

        return redirect()->route('order-show', $order->id)->with('success', 'Đặt hàng thành công');
    }
}

