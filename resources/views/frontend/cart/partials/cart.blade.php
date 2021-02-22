<div class="col-lg-12">
    <div class="row">
        <div class="col-md-9">
            <div>
                <div>
                    <div style="float:left"><img src="{{ asset('./images/ico/cart-ico.png') }}" alt="cart-ico"
                                                 height="40px">
                    </div>
                    <h1 style="margin-left:30px">Giỏ hàng</h1>
                </div>
                <div class="m-3">
                    @include('frontend.base.message')
                </div>
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
                                            <p><a href="{{ route('show',$product['productInfo']->id) }}">{{ $product['productInfo']->name }}</a></p>
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
                                    <select class="quanty" data-id="{{ $product['productInfo']->id }}">
                                        @for($i = 1; $i <= $product['productInfo']->stocked ; $i++)
                                            <option
                                                {{ $product['quanty'] == $i ? "selected" : "" }} value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td class="align-self-center" style="width:15%;text-align:left">
                                    <strong
                                        class="gia-sanpham product-price" id="product-price-{{ $product['productInfo']->id }}">{{ number_format($product['quanty']*$product['productInfo']->price) }}
                                        VNĐ</strong>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger text-center delete-cart"
                                            data-id="{{ $product['productInfo']->id }}">X
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="p-4 d-flex justify-content-between">
                    <div>
                        @if(Session::get("Cart") != null)
                        <a href="{{ route('purchase') }}" class="btn-warning btn" type="button">Mua hàng</a>
                        @endif
                        <a href="{{ route('home') }}" class="btn btn-secondary">Mua tiếp</a>
                    </div>
                    &nbsp;<h4>Tổng cộng :
                        @if(Session::get('Cart') != null)
                            <strong class="gia-sanpham"
                                    id="total-price">{{number_format(Session::get("Cart")->totalPrice)}} VNĐ</strong>
                        @endif
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <img src="images/site/hotro-chitiet.PNG" alt="ho-tro" style="width: 250px">
        </div>
    </div>
</div>
