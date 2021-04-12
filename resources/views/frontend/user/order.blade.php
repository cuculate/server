@extends('frontend.base.base')

@section('title','Đơn hàng')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">Home</a></li>
                    <li class="item-link"><a href="{{ route('profile', Session::get('User')->id) }}" class="link">Trang
                            cá nhân</a></li>
                    <li class="item-link"><span>Đơn hàng</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="advance-info" id="advance-info">
                            <div class="tab-control normal">
                                <a class="tab-control-item active" href="#waiting">Chờ duyệt</a>
                                <a class="tab-control-item" href="#processing">Đang chuẩn bị</a>
                                <a class="tab-control-item" href="#transporting">Giao hàng</a>
                                <a class="tab-control-item" href="#done">Hoàn thành</a>
                                <a class="tab-control-item" href="#refund">Trà hàng</a>
                                <a class="tab-control-item" href="#canceled">Hủy đơn</a>
                            </div>
                            <div class="tab-contents">
                                @include('frontend.user.partials.order-wait',['orders' => $orderWait])
                                @include('frontend.user.partials.order-process', ['orders' => $orderProcess])
                                @include('frontend.user.partials.order-transport',['orders' => $orderTransport])
                                @include('frontend.user.partials.order-completed',['orders' => $orderCompleted])
                                @include('frontend.user.partials.order-refund',['orders' => $orderRefund])
                                @include('frontend.user.partials.order-canceled',['orders' => $orderCanceled])
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

                @include('frontend.user.partials.left-menu')
            </div>
        </div>
    </main>
@endsection
