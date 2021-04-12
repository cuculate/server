@extends('frontend.base.base')

@section('title','Shop')

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
                            <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Đồ chơi</h1>

                        <div class="wrap-right">

                            <div class="sort-item orderby ">
                                <select name="orderby" class="use-chosen">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity" @if(isset($_GET['sort']) &&  $_GET['sort'] == 'popularity') selected=""
                                        @endif>Sort by popularity</option>
                                    <option value="rating" @if(isset($_GET['sort']) && $_GET['sort'] == 'rating') selected=""
                                        @endif>Sort by average rating</option>
                                    <option value="date" @if(isset($_GET['sort']) && $_GET['sort'] == 'date') selected=""
                                        @endif>Sort by newness</option>
                                    <option value="price" @if(isset($_GET['sort']) && $_GET['sort'] == 'price') selected=""
                                        @endif>Sort by price: low to high</option>
                                    <option value="price-desc" @if(isset($_GET['sort']) && $_GET['sort'] == 'price-desc') selected=""
                                        @endif>Sort by price: high to low</option>
                                </select>
                            </div>

                            <div class="sort-item product-per-page">
                                <select name="post-per-page" class="use-chosen">
                                    <option value="12" selected="selected" @if(isset($_GET['page']) &&  $_GET['page'] == 12) selected=""
                                        @endif>12 per page</option>
                                    <option value="16"@if(isset($_GET['page']) &&  $_GET['page'] == 16) selected=""
                                        @endif>16 per page</option>
                                    <option value="18"@if(isset($_GET['page']) &&  $_GET['page'] == 18) selected=""
                                        @endif>18 per page</option>
                                    <option value="21"@if(isset($_GET['page']) &&  $_GET['page'] == 21) selected=""
                                        @endif>21 per page</option>
                                    <option value="24"@if(isset($_GET['page']) &&  $_GET['page'] == 24) selected=""
                                        @endif>24 per page</option>
                                    <option value="30"@if(isset($_GET['page']) &&  $_GET['page'] == 30) selected=""
                                        @endif>30 per page</option>
                                    <option value="32"@if(isset($_GET['page']) &&  $_GET['page'] == 32) selected=""
                                        @endif>32 per page</option>
                                </select>
                            </div>

                            <div class="change-display-mode">
                                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                                <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                            </div>

                        </div>

                    </div><!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach($products as $product)
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('show', $product->id) }}" title="{{ $product->name }}">
                                                <figure><img src="images/sanpham/{{$product->image}}"
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
                                                      src="images/site/out-of-stock.png"
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

