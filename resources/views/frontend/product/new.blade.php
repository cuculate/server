@extends('frontend.base.base')

@section('title','Sản phẩm mới')

@section('js')
    <script src="{{ asset('./js/cart.js') }}"></script>
@endsection

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Home</a></li>
                    <li class="item-link"><span>Shop</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Đồ chơi</h1>

                        @include('frontend.product.partials.sort')

                    </div><!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach($products as $product)
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('show', $product->id) }}" title="{{ $product->name }}">
                                                <figure><img src="{{ asset('images/sanpham/'. $product->image) }}"
                                                             alt="{{ $product->name }}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                @if($product->new == 1)
                                                    <span class="flash-item new-label">new</span>
                                                @endif
                                                @if($product->sale == 1)
                                                    <span class="flash-item sale-label">sale</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('show', $product->id) }}" class="product-name"><span>{{ $product->name }}]</span></a>
                                            <div class="wrap-price">
                                                @if($product->sale == 1)
                                                    <ins>
                                                        <p class="product-price">{{number_format($product->price)}}
                                                            VNĐ</p>
                                                    </ins>
                                                    <del>
                                                        <p class="product-price">{{number_format($product->old_price)}}
                                                            VNĐ</p></del>
                                                @else
                                                    <span class="product-price">{{number_format($product->price)}} VNĐ</span>
                                                @endif
                                            </div>
                                            @if($product->stocked > 0)
                                                <a href="#" class="btn add-to-cart"
                                                   onclick="AddCart({{ $product->id }})">Cho
                                                    Vào Giỏ</a>
                                            @else<img class="btn add-to-cart"
                                                      src="{{ asset('images/site/out-of-stock.png') }}"
                                                      style="width: 100%;margin-top: 5%;display: block;;"
                                                      alt="Out of Stock">

                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            {{$products->links()}}
                        </ul>
                    </div>
                </div><!--end main products area-->

            @include('frontend.product.partials.left-menu')
            <!--end sitebar-->

            </div><!--end row-->
        </div>
    </main>
@endsection

