@extends('frontend.base.base')

@section('title','Mua hàng')

@section('js')
    <script src="{{ asset('./js/purchase.js') }}"></script>
@endsection

@section('main')
    <main id="main" class="main-site">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Mua hàng</span></li>
                </ul>
            </div>
            <div class=" main-content-area">
                <div class="wrap-address-billing">
                    <h3 class="box-title">Thông tin đơn hàng</h3>
                    <form action="{{ route('order', Session::get('User')->id) }}" method="post" id="order" name="order">
                        @include('frontend.base.message')
                        <p class="row-in-form">
                            <label for="name">Tên người nhận<span>*</span></label>
                            <input id="name" type="text" name="name" value="{{ Session::get('User')->name }}">
                        </p>
                        <p class="row-in-form">
                            <label for="address">Địa chỉ<span>*</span></label>
                            <input id="address" type="text" name="address" value="{{ Session::get('User')->address }}">
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Số điện thoại<span>*</span></label>
                            <input id="phone" type="number" name="phone" value="{{ Session::get('User')->phone }}">
                        </p>
                        <div class="row-in-form">
                            <label for="area">Tỉnh</label>
                            <select id="area" name="area_id" style="width: 200px; height: 37px">
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" id="time-{{ $area->id }}"
                                            data-time="{{ $area->information }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                            <span id="time-ship">Vận chuyển trong 1 - 2 ngày làm việc.</span>
                        </div>
                        <div class="summary summary-checkout">
                            <div class="summary-item payment-method">
                                <h4 class="title-box">Phương thức thanh toán</h4>
                                <p class="summary-info"><span
                                        class="title">Thanh toán bằng chuyển khoản qua ngân hàng</span>
                                </p>
                                <p class="summary-info"><span
                                        class="title">Thanh toán trực tiếp khi nhận hàng (COD)</span>
                                </p>
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="pay_id" id="payment-method-bank" value="2" type="radio">
                                        <span>Chuyển khoản</span>
                                        <span class="payment-desc"><a href="{{route('post','thanh-toan')}}">Xem thêm</a></span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="pay_id" id="payment-method-cod" value="1" type="radio">
                                        <span>COD</span>
                                        <span class="payment-desc">Khách hàng thanh toán trực tiếp cho nhân viên giao hàng khi nhận hàng.</span>
                                    </label>
                                </div>
                                <p class="summary-info grand-total"><span>Thanh toán:</span> <span
                                        class="grand-total-price">{{number_format(Session::get("Cart")->totalPrice)}} VNĐ</span>
                                </p>
                                <button type="submit" class="btn btn-medium">Đặt hàng</button>
                            </div>
                            <div class="summary-item shipping-method">
                                <h4 class="title-box f-title">Shipping method</h4>
                                <p class="summary-info"><span class="title">Chuyển phát nhanh</span></p>
                                <p class="summary-info"><span class="title">Free Ship</span></p>
                                <h4 class="title-box">Mã giảm giá</h4>
                                <p class="row-in-form">
                                    <label for="coupon-code">Nhập mã giảm giá:</label>
                                    <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
                                </p>
                                <a href="#" class="btn btn-small">Nhập</a>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div><!--end main content area-->
        </div>
    </main>
@endsection
