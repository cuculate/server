<div class="cart-hover p-3 border">
    <div id="change-item-card">
        @if( Session::has("Cart") != null)
            <div class="select-items">
                <table class="table table-borderless border-bottom">
                    <tbody>
                    @foreach(Session::get("Cart")->products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('./images/sanpham/'.$product['productInfo']->image)}}" alt="">
                            </td>
                            <td>
                                <div class="product-selected">
                                    @if($product['productInfo']->sale === 1)
                                        <label
                                            class="giagiam-sanpham">{{number_format($product['productInfo']->old_price)}}
                                            VNĐ</label>
                                        <div
                                            class="phamtram-giamgia">{{100 -round(($product['productInfo']->price / $product['productInfo']->old_price)*100)}}
                                            %
                                        </div>
                                    @endif
                                    <p>{{ number_format($product['productInfo']->price) }} VNĐ
                                        x {{$product['quanty']}}</p>
                                    <h6>{{ $product['productInfo']->name }}</h6>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger text-center delete-cart"
                                        data-id="{{$product['productInfo']->id}}">X
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="select-total d-flex justify-content-between">
                <span>Tổng:</span>
                <h5 class="">{{ number_format(Session::get("Cart")->totalPrice) }} VNĐ</h5>
                <input hidden id="quanty-cart" type="number"
                       value="{{Session::get("Cart")->totalQuanty}}">
            </div>
            <div class="d-flex justify-content-between">
                <div class="select-button">
                    <a href="{{ route('cart') }}" class="btn btn-sm btn-outline-success">Xem giỏ hàng</a>
                </div>
                <div class="select-button">
                    <a href="{{ route('purchase') }}" class="btn btn-sm btn-outline-success">Mua hàng</a>
                </div>
            </div>
        @else
            <p>Chưa có sản phẩm nào trong giỏ hàng</p>
        @endif
    </div>
</div>
