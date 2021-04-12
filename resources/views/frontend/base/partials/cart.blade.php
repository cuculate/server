<div class="cart-hover shopping-cart main-content-area">
    <div id="change-item-card">
        @if( Session::has("Cart") != null)
            <div class="shopping-cart main-content-area">
                <div class="wrap-iten-in-cart">
                    <h3 class="box-title">Giỏ hàng</h3>
                    <ul class="products-cart">
                        @if(Session::get('Cart') != null)
                            @foreach(Session::get("Cart")->products as $product)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('./images/sanpham/'.$product['productInfo']->image)}}"
                                                     alt="{{ $product['productInfo']->name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('show',$product['productInfo']->id) }}">{{ $product['productInfo']->name }}</a>
                                    </div>
                                    <div class="product-quantity">
                                        <p class="quantity">x {{ $product['quanty'] }}</p>
                                    </div>
                                    <div class="price-field product-price">
                                        <p class="price"
                                           id="price-{{ $product['productInfo']->id }}"
                                           data-price="{{ $product['productInfo']->price }}">{{ number_format($product['productInfo']->price) }}
                                            VNĐ</p>
                                    </div>
                                    <div class="delete">
                                        <button class="btn btn-delete delete-cart"
                                                data-id="{{ $product['productInfo']->id }}">
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="select-total product-info">
                    <span style="font-weight: bold">Tổng:</span>
                    <div class="wrap-price">
                        <h5 class="product-price">{{ number_format(Session::get("Cart")->totalPrice) }} VNĐ</h5>
                    </div>
                    <input hidden id="quanty-cart" type="number"
                           value="{{Session::get("Cart")->totalQuanty}}">
                </div>
            </div>
            <div class="cart-button">
                <a href="{{ route('cart') }}" class="btn btn-success">Xem giỏ hàng</a>
                <a href="{{ route('purchase') }}" class="purchase btn btn-danger">Mua hàng</a>
            </div>
        @else
            <p>Chưa có sản phẩm nào trong giỏ hàng</p>
        @endif
    </div>
</div>
