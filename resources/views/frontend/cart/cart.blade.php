@extends('frontend.base.base')

@section('title','Giỏ hàng')

@section('js')
    <script src="{{ asset('./js/list-cart.js') }}"></script>
@endsection

@section('main')
    <main id="main" class="main-site">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Giỏ hàng</span></li>
                </ul>
            </div>
            <div class=" main-content-area">

                <div class="row" id="cart-show">
                    @include('frontend.cart.partials.cart')
                </div>

                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Đồ chơi khác</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                             data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            @foreach( $productRandoms as $product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('show', $product->id) }}"
                                           title="{{ $product->name }}">
                                            <figure><img src="images/sanpham/{{$product->image}}" width="800"
                                                         height="800" alt="{{ $product->name }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            @if($product->new == 1)
                                                <span class="flash-item new-label">new</span>
                                            @endif
                                            @if($product->sale == 1)
                                                <span class="flash-item sale-label">sale</span>
                                            @endif

                                        </div>
                                        <div class="wrap-btn">
                                            @if($product->stocked > 0)
                                                <div class="add-to-cart"
                                                     onclick="AddCart({{ $product->id }})">
                                                    <input class="btn function-link" type="button"
                                                           value="Cho vào giỏ">
                                                </div>
                                            @else
                                                <img class="function-link" src="images/site/out-of-stock.png"
                                                     style="height: 20px;"
                                                     alt="Out of Stock">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('show', $product->id) }}"
                                           class="product-name"><span>{{ $product->name }}</span></a>
                                        <div class="wrap-price">
                                            @if($product->sale == 1)
                                                <ins><p class="product-price">{{number_format($product->price)}} VNĐ</p>
                                                </ins>
                                                <del><p class="product-price">{{number_format($product->old_price)}}
                                                        VNĐ</p></del>
                                            @else
                                                <span
                                                    class="product-price">{{number_format($product->price)}} VNĐ</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--End wrap-products-->
                </div>

            </div>
        </div>
    </main>

@endsection
