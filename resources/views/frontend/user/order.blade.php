@extends('frontend.base.base')

@section('title','Đơn hàng')

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <a href="{{ route('profile', Session::get('User')->id) }}">{{ Session::get('User')->name }} </a> >
            <label style="color:#777777">Đơn hàng</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('profile', Session::get('User')->id) }}">
                                        <h4>Thông tin tài khoản</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('list-order', Session::get('User')->id) }}">
                                        <h4>Đơn hàng</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#waiting">Chờ duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#processing">Đang chuẩn bị</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#transporting">Giao hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#done">Hoàn thành</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#refund">Trà hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#canceled">Hủy đơn</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            @include('frontend.user.partials.order-wait',['orders' => $orderWait])
                            @include('frontend.user.partials.order-process', ['orders' => $orderProcess])
                            @include('frontend.user.partials.order-transport',['orders' => $orderTransport])
                            @include('frontend.user.partials.order-completed',['orders' => $orderCompleted])
                            @include('frontend.user.partials.order-refund',['orders' => $orderRefund])
                            @include('frontend.user.partials.order-canceled',['orders' => $orderCanceled])
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
