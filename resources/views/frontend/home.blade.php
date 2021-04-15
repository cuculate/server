@extends('frontend.base.base')

@section('title','Trang Chủ')

@section('main')
    <main id="main">
        <div class="container">

            <!--MAIN SLIDE-->
            @include('frontend.base.partials.slide')

            <!--On Sale-->
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">Giảm giá</h3>
{{--                <div class="wrap-countdown mercado-countdown" data-expire="2021/12/12 12:34:56"></div>--}}
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                     data-loop="false" data-nav="true" data-dots="false"
                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                    @foreach($productSales->slice(0,10) as $sale)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('show', $sale->id) }}" title="{{ $sale->name }}">
                                    <figure><img src="{{ asset('images/sanpham/' . $sale->image) }}" width="800"
                                                 height="800"
                                                 alt="{{ $sale->name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    @if($sale->new == 1)
                                        <span class="flash-item new-label">new</span>
                                    @endif
                                    @if($sale->sale == 1)
                                        <span class="flash-item sale-label">sale</span>
                                    @endif

                                </div>
                                <div class="wrap-btn">
                                    @if($sale->stocked > 0)
                                        <div class="add-to-cart"
                                             onclick="AddCart({{ $sale->id }})">
                                            <input class="btn function-link" type="button"
                                                   value="Cho vào giỏ">
                                        </div>
                                    @else
                                        <img class="function-link" src="{{ asset('images/site/out-of-stock.png')}}"
                                             style="height: 20px;"
                                             alt="Out of Stock">
                                    @endif
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('show', $sale->id) }}"
                                   class="product-name"><span>{{ $sale->name }}</span></a>
                                <div class="wrap-price">
                                    @if($sale->sale == 1)
                                        <ins><p class="product-price">{{number_format($sale->price)}} VNĐ</p>
                                        </ins>
                                        <del><p class="product-price">{{number_format($sale->old_price)}}
                                                VNĐ</p></del>
                                    @else
                                        <span class="product-price">{{number_format($sale->price)}} VNĐ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!--Hot Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Đồ Chơi Bán Chạy</h3>
                {{--        <div class="wrap-top-banner">--}}
                {{--            <a href="#" class="link-banner banner-effect-2">--}}
                {{--                <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt="">--}}
                {{--                </figure>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                     data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @foreach($productHots->slice(0,10) as $hot)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('show', $hot->id) }}" title="{{ $hot->name }}">
                                                    <figure><img src="{{ asset('images/sanpham/' . $hot->image) }}" width="800"
                                                                 height="800"
                                                                 alt="{{ $hot->name }}"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    @if($hot->new == 1)
                                                        <span class="flash-item new-label">new</span>
                                                    @endif
                                                    @if($hot->sale == 1)
                                                        <span class="flash-item sale-label">sale</span>
                                                    @endif

                                                </div>
                                                <div class="wrap-btn">
                                                    @if($hot->stocked > 0)
                                                        <div class="add-to-cart"
                                                             onclick="AddCart({{ $hot->id }})">
                                                            <input class="btn function-link" type="button"
                                                                   value="Cho vào giỏ">
                                                        </div>
                                                    @else
                                                        <img class="function-link" src="{{ asset('images/site/out-of-stock.png')}}"
                                                             style="height: 20px;"
                                                             alt="Out of Stock">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('show', $hot->id) }}"
                                                   class="product-name"><span>{{ $hot->name }}</span></a>
                                                <div class="wrap-price">
                                                    @if($hot->sale == 1)
                                                        <ins><p class="product-price">{{number_format($hot->price)}}
                                                                VNĐ</p>
                                                        </ins>
                                                        <del><p class="product-price">{{number_format($hot->old_price)}}
                                                                VNĐ</p></del>
                                                    @else
                                                        <span
                                                            class="product-price">{{number_format($hot->price)}} VNĐ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--New Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Đồ Chơi Mới</h3>
                {{--        <div class="wrap-top-banner">--}}
                {{--            <a href="#" class="link-banner banner-effect-2">--}}
                {{--                <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt="">--}}
                {{--                </figure>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                     data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                     data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                    @foreach($productNews->slice(0,10) as $new)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('show', $new->id) }}" title="{{ $new->name }}">
                                                    <figure><img src="{{ asset('images/sanpham/' . $new->image) }}" width="800"
                                                                 height="800"
                                                                 alt="{{ $new->name }}"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    @if($new->new == 1)
                                                        <span class="flash-item new-label">new</span>
                                                    @endif
                                                    @if($new->sale == 1)
                                                        <span class="flash-item sale-label">sale</span>
                                                    @endif

                                                </div>
                                                <div class="wrap-btn">
                                                    @if($new->stocked > 0)
                                                        <div class="add-to-cart"
                                                             onclick="AddCart({{ $new->id }})">
                                                            <input class="btn function-link" type="button"
                                                                   value="Cho vào giỏ">
                                                        </div>
                                                    @else
                                                        <img class="function-link" src="{{ asset('images/site/out-of-stock.png')}}"
                                                             style="height: 20px;"
                                                             alt="Out of Stock">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('show', $new->id) }}"
                                                   class="product-name"><span>{{ $new->name }}</span></a>
                                                <div class="wrap-price">
                                                    @if($new->sale == 1)
                                                        <ins><p class="product-price">{{number_format($new->price)}}
                                                                VNĐ</p>
                                                        </ins>
                                                        <del><p class="product-price">{{number_format($new->old_price)}}
                                                                VNĐ</p></del>
                                                    @else
                                                        <span
                                                            class="product-price">{{number_format($new->price)}} VNĐ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Nhóm Đồ Chơi</h3>
                {{--        <div class="wrap-top-banner">--}}
                {{--            <a href="#" class="link-banner banner-effect-2">--}}
                {{--                <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt="">--}}
                {{--                </figure>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach($categories as $category)
                                <a href="{{ '#category' . $category->id }}"
                                   class="tab-control-item @if($loop->first) active @endif">{{ $category->name }}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">
                            @foreach($categories as $category)
                                <div class="tab-content-item @if($loop->first) active @endif"
                                     id="{{ 'category' . $category->id }}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                         data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        @foreach($products->where('category_id', $category->id) as $product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{ route('show', $product->id) }}"
                                                       title="{{ $product->name }}">
                                                        <figure><img src="{{ asset('images/sanpham/' . $product->image) }}"
                                                                     width="800"
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
                                                            <img class="function-link"
                                                                 src="{{ asset('images/site/out-of-stock.png')}}"
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
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($category->childrenCategories()->count() > 0)
                                            @foreach ($category->childrenCategories as $child)
                                                @foreach($products->where('category_id', $child->id) as $product)
                                                    <div class="product product-style-2 equal-elem ">
                                                        <div class="product-thumnail">
                                                            <a href="{{ route('show', $product->id) }}"
                                                               title="{{ $product->name }}">
                                                                <figure><img src="{{ asset('images/sanpham/' . $product->image) }}"
                                                                             width="800"
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
                                                                    <img class="function-link"
                                                                         src="{{ asset('images/site/out-of-stock.png')}}"
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
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Brands-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Hãng Đồ Chơi</h3>
                {{--        <div class="wrap-top-banner">--}}
                {{--            <a href="#" class="link-banner banner-effect-2">--}}
                {{--                <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt="">--}}
                {{--                </figure>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach($brands as $brand)
                                <a href="{{ '#brand' . $brand->id }}"
                                   class="tab-control-item @if($loop->first) active @endif ">{{ $brand->name }}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">
                            @foreach($brands as $brand)
                                <div class="tab-content-item @if($loop->first) active @endif"
                                     id="{{ 'brand' . $brand->id }}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                         data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        @foreach($products->where('brand_id', $brand->id) as $product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{ route('show', $product->id) }}"
                                                       title="{{ $product->name }}">
                                                        <figure><img src="{{ asset('images/sanpham/' . $product->image) }}"
                                                                     width="800"
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
                                                            <img class="function-link"
                                                                 src="{{ asset('images/site/out-of-stock.png')}}"
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
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Ages-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Nhóm Tuổi</h3>
                {{--        <div class="wrap-top-banner">--}}
                {{--            <a href="#" class="link-banner banner-effect-2">--}}
                {{--                <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt="">--}}
                {{--                </figure>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach($ages as $age)
                                <a href="{{ '#age' . $age->id }}"
                                   class="tab-control-item @if($loop->first) active @endif ">{{ $age->name }}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">
                            @foreach($ages as $age)
                                <div class="tab-content-item @if($loop->first) active @endif"
                                     id="{{ 'age' . $age->id }}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                         data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                         data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                        @foreach($products->where('age_id', $age->id) as $product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{ route('show', $product->id) }}"
                                                       title="{{ $product->name }}">
                                                        <figure><img src="{{ asset('images/sanpham/' . $product->image) }}"
                                                                     width="800"
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
                                                            <img class="function-link"
                                                                 src="{{ asset('images/site/out-of-stock.png')}}"
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
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection

