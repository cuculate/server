@extends('frontend.base.base')

@section('title','Mua hàng')

@section('js')
    <script src="{{ asset('./js/purchase.js') }}"></script>
@endsection

@section('main')
    <div>
        <h1 class="m-5">Thông tin đơn hàng</h1>
        <form class="row m-3" action="{{ route('order', Session::get('User')->id) }}" method="post">
            @csrf

            <div class="col-md-3 ml-3 ml-3">
                @include('frontend.base.message')
                <div class="form-group">
                    <label for="name">Tên người nhận:</label>
                    <input type="text" class="form-control" id="name" placeholder="tên người nhận" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" placeholder="địa chỉ" name="address" required>
                </div>
                <div class="form-group">
                    <label for="name">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone" placeholder="số điện thoại" name="phone"
                           required>
                </div>
                <div class="form-group">
                    <label for="area">Tỉnh</label>
                    <select class="form-control" id="area" name="area_id">
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" id="time-{{ $area->id }}"
                                    data-time="{{ $area->information }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-4" id="time-ship">Vận chuyển trong 1 - 2 ngày làm việc.</p>
                </div>
                <div class="form-group">
                    <label for="payment">Phương thức thanh toán</label>
                    <select class="form-control" id="payment" name=" pay_id">
                        @foreach($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input class="btn-warning btn" type="submit" value="Thanh toán ngay">&nbsp;
                    <a href="{{ route('cart') }}" class="btn btn-secondary">Giỏ hàng</a>
                </div>
            </div>
            <div class="col-md-7">
                <hr>
                <table style="width:100%;" class="table" id="table">
                    <thead>
                    <tr class="bg-info">
                        <th style="width:45%">Sản phẩm</th>
                        <th style="width:20%">Giá</th>
                        <th style="width:15%;text-align:left">Số lượng</th>
                        <th style="width:20%">Tổng giá</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::get('Cart') != null)
                        @foreach(Session::get("Cart")->products as $product)
                            <tr id="row-{{ $product['productInfo']->id }}" data-id="{{ $product['productInfo']->id }}">
                                <td style="width:55%">
                                    <div style="float:left">
                                        <img height="75px" width="75px" class="m-2"
                                             src="{{ asset('./images/sanpham/'.$product['productInfo']->image)}}"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div>
                                            <p>
                                                <a href="{{ route('show',$product['productInfo']->id) }}">{{ $product['productInfo']->name }}</a>
                                            </p>
                                            <br>
                                            <p>{{ $product['productInfo']->brand->name }}</p>
                                        </div>
                                        Sản xuất tại :
                                        <span
                                            class="text-secondary">{{ $product['productInfo']->made_in }}</span>
                                    </div>
                                </td>
                                <td class="align-self-center" style="width:15%">
                                    <strong class="gia-sanpham" id="price-{{ $product['productInfo']->id }}"
                                            data-price="{{ $product['productInfo']->price }}">{{ number_format($product['productInfo']->price) }}
                                        VNĐ</strong>
                                </td>
                                <td class="align-self-center" style="width:10%">
                                    <p class="text-center">{{ $product['quanty'] }}</p>
                                </td>
                                <td class="align-self-center" style="width:15%;text-align:left">
                                    <strong
                                        class="gia-sanpham product-price"
                                        id="product-price-{{ $product['productInfo']->id }}">{{ number_format($product['quanty']*$product['productInfo']->price) }}
                                        VNĐ</strong>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="p-4 d-flex justify-content-end">
                    &nbsp;<h4>Tổng cộng :
                        @if(Session::get('Cart') != null)
                            <strong class="gia-sanpham"
                                    id="total-price">{{number_format(Session::get("Cart")->totalPrice)}} VNĐ</strong>
                        @endif
                    </h4>
                </div>
            </div>
        </form>
    </div>
@endsection
