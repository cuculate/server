@extends('frontend.base.base')

@section('title','Sản phẩm')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" type="text/css" href="assets/css/flexslider.css">
@endsection

@section('main')
    <main id="main" class="main-site">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><a href="{{route('search')}}?product-cate={{ $category->id }}"
                                             class="link">{{ $category->name }}</a></li>
                    <li class="item-link"><a href="{{route('search')}}?brands={{ $brand->id }}"
                                             class="link">{{ $brand->name }}</a></li>
                    <li class="item-link"><span>{{$product->name}}</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">
                                    <li data-thumb="images/sanpham/{{$product->image}}">
                                        <img src="images/sanpham/{{$product->image}}" alt="{{ $product->name }}"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="detail-info">
                            <div class="product-rating">
                                @for($i = 1; $i <= $avgStar; $i++ )
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endfor
                                <a href="#advance-info" class="count-review">({{ count($feedbacks) }} đánh giá)</a>
                            </div>
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div class="short-desc">
                                <ul>
                                    <li>Hãng {{ $brand->name }}</li>
                                    <li>Chất liệu {{ $product->material }}</li>
                                    <li>Sản xuất tại {{ $product->made_in }}</li>
                                </ul>
                            </div>
                            <div class="wrap-social">
                                <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                            </div>
                            <div class="wrap-price"><span
                                    class="product-price">{{ number_format($product->price) }} VNĐ</span>
                            </div>
                            <div class="stock-info in-stock">
                                <p class="availability">Tình trạng:
                                    @if($product->stocked > 0)<b>Còn hàng</b>
                                    @else
                                        <b>Hết hàng</b>
                                    @endif
                                </p>
                            </div>
                            {{--                    <div class="quantity">--}}
                            {{--                        <span>Quantity:</span>--}}
                            {{--                        <div class="quantity-input">--}}
                            {{--                            <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >--}}

                            {{--                            <a class="btn btn-reduce" href="#"></a>--}}
                            {{--                            <a class="btn btn-increase" href="#"></a>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                            <div class="wrap-butons">
                                <a href="#" class="btn add-to-cart" onclick="AddCart({{ $product->id }})">Thêm vào giỏ
                                    hàng</a>
                            </div>
                        </div>
                        <div class="advance-info" id="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">Thông tin</a>
                                <a href="#add_infomation" class="tab-control-item">Chi tiết</a>
                                <a href="#review" class="tab-control-item">Đánh giá</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    {!! $product->information !!}
                                    <br>
                                    {!! $brand->information !!}
                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                        <tr>
                                            <th>Sản xuất tại</th>
                                            <td class="product_made_in">{{ $product->made_in }}</td>
                                        </tr>
                                        <tr>
                                            <th>Chất liệu</th>
                                            <td class="product_material">{{ $product->material }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kích thước</th>
                                            <td class="product_dimensions">{{ $product->length . 'x' . $product->width . 'x' . $product->height }}
                                                cm
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Màu</th>
                                            <td class="product_color">{{ $product->color }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{ count($feedbacks) }} đánh giá for
                                                <span>{{ $product->name }}</span>
                                            </h2>
                                            <ol class="commentlist">
                                                @foreach($feedbacks as $feedback)
                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                        id="li-comment-20">
                                                        <div id="comment-20" class="comment_container">
                                                            <img alt="" src="assets/images/author-avata.jpg" height="80"
                                                                 width="80">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                        <span class="width-{{($feedback->star / 5)*100}}-percent">Rated <strong
                                                                class="rating">{{ $feedback->star }}</strong> out of 5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong
                                                                        class="woocommerce-review__author">{{ $feedback->name }}</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                          datetime="{{ now() }}">{{ date($feedback->created_at) }}
                                                                    </time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{ $feedback->title }}:</p>
                                                                    <p>{{ $feedback->content }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div><!-- #comments -->

                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    @include('frontend.product.partials.feedback')

                                                </div><!-- .comment-respond-->
                                            </div><!-- #review_form -->
                                        </div><!-- #review_form_wrapper -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Đồ chơi khác</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @foreach($productRandoms as $product)
                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="{{ route('show', $product->id) }}"
                                                   title="{{ $product->name }}">
                                                    <figure><img src="images/sanpham/{{$product->image}}"
                                                                 alt="{{ $product->name }}"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('show', $product->id) }}"
                                                   class="product-name"><span>{{ $product->name }}</span></a>
                                                <div class="wrap-price"><span class="product-price">{{ number_format($product->price) }} VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div><!--end sitebar-->

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Related Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                 data-loop="false" data-nav="true" data-dots="false"
                                 data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                @foreach($relatedProducts as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('show',$product->id) }}#xem" title="{{ $product->name }}">
                                                <figure><img src="images/sanpham/{{$product->image}}" width="214"
                                                             height="214"
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
                                            <div class="wrap-btn">
                                                <a href="{{ route('show',$product->id) }}#xem"
                                                   class="function-link">Xem</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{ number_format($product->price) }} VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!--End wrap-products-->
                        </div>
                    </div>

                </div><!--end row-->
            </div>
        </div>
    </main>
@endsection

