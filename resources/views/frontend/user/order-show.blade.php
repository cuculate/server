@extends('frontend.base.base')

@section('title','Đơn hàng')

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <a href="{{ route('profile', Session::get('User')->id) }}"> Trang cá nhân </a> >
            <label style="color:#777777">Đơn hàng</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active"
                                       href="{{ route('profile', Session::get('User')->id) }}">
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
                        <h1 class="mt-5 mb-4">Thông tin đơn</h1>
                        @include('frontend.base.message')
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số hóa đơn: {{ $order->id }}</label>
                            </div>
                            <div class="col-md-3">
                                <label>Ngày tạo: {{ $order->created_at }}</label>
                            </div>
                            <div class="col-md-3">
                                <label>Ngày xử lý: {{ $order->updated_at }}</label>
                            </div>
                            <div class="col-md-3">
                                <label>Tên người nhận: {{ $order->name }}</label>
                            </div>
                            <div class="col-md-3">
                                <label> Địa chỉ: {{ $order->address }}</label>
                            </div>
                            <div class="col-md-3">
                                <label> Số điện thoại: {{ $order->phone }}</label>
                            </div>
                            <div class="col-md-3">
                                <label> Tỉnh: {{ $order->area->name }}</label>
                            </div>
                        </div>
                        <form action="{{ route('order-delete', $order->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mt-2">Trạng thái: </label>
                                    {!! getNameStatus($order->status)!!}
                                </div>
                                <div class="col-md-2" style="{{ $order->status >= 2 ? 'display:none' : '' }}">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#orderDelete">
                                        Hủy đơn
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="orderDelete">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hủy đơn hàng</h4>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Bạn có chắc muốn hủy đơn hàng?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="submit">Hủy đơn</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-hover table-active">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th class="text-right">Số lượng</th>
                                <th class="text-right">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $detail as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ currency_format($detail->price) }} VND</td>
                                    <td>
                                        <img src="{{ asset('./images/sanpham/' . $detail->image ) }}"
                                             alt="{{ $detail->name }}"
                                             style="height: 50px">
                                    </td>
                                    <td class="text-right">{{ $detail->pivot->quantity }}</td>
                                    <td class="gia-sanpham">{{ currency_format($detail->pivot->total_price) }} VND</td>
                                </tr>
                            @endforeach
                            <tr class="bg-info">
                                <td colspan="5"
                                    class="text-center">Tổng tiền
                                </td>
                                <td class="gia-sanpham"> {{ currency_format($order->total_price) }} VND</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
