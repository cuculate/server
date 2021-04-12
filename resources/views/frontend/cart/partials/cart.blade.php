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
                            <a class="link-to-product"
                               href="{{ route('show',$product['productInfo']->id) }}">{{ $product['productInfo']->name }}</a>
                        </div>
                        <div class="price-field product-price">
                            <p class="price"
                               id="price-{{ $product['productInfo']->id }}"
                               data-price="{{ $product['productInfo']->price }}">{{ number_format($product['productInfo']->price) }}
                                VNĐ</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" class="product-quantity"
                                       id="quanty-{{ $product['productInfo']->id }}" name="product-quatity"
                                       value="{{ $product['quanty'] }}"
                                       data-id="{{ $product['productInfo']->id }}" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-increase" href="#" data-id="{{ $product['productInfo']->id }}"></a>
                                <a class="btn btn-reduce" href="#" data-id="{{ $product['productInfo']->id }}"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price"
                                                              id="product-price-{{ $product['productInfo']->id }}">{{ number_format($product['quanty']*$product['productInfo']->price) }}
                                VNĐ</p></div>
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
    <div class="summary">
        <div class="order-summary">
            <h4 class="title-box">Tổng đơn</h4>
            @if(Session::get('Cart') != null)
                <p class="summary-info"><span class="title">Đơn hàng</span><b class="index"
                                                                              id="sub-total">{{number_format(Session::get("Cart")->totalPrice)}}
                        VNĐ</b></p>
                <p class="summary-info"><span class="title">Phí ship</span><b class="index">Free ship</b></p>
                <p class="summary-info total-info "><span class="title">Tổng</span><b
                        class="index" id="total-price">{{number_format(Session::get("Cart")->totalPrice)}} VNĐ</b></p>
            @endif
        </div>
        <div class="checkout-info">
            <a class="btn btn-checkout" href=" {{ route('purchase') }}">Mua hàng</a>
            <a class="link-to-shop" href="{{ route('home') }}">Tiếp tục mua hàng<i class="fa fa-arrow-circle-right"
                                                                                   aria-hidden="true"></i></a>
        </div>
    </div>
</div>
