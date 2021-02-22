@extends('frontend.base.base')

@section('title','Hướng dẫn mua hàng')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Hướng dẫn mua hàng</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-2 ml-5">
            @include('frontend.post.partials.link')
        </div>
        <div class="col-md-8">
            <div style="line-height:20px">
                <div style="margin-left:230px"><img src="{{ asset('./images/site/huongdanmuahang.png') }}"></div>
                <div style="height:30px"></div>
                <strong class="combine">I. ĐẶT HÀNG</strong>
                <div style="height:15px"></div>
                <p><strong>Bước 1</strong>: Mẹ vào thăm Combine, chọn được sản phẩm ứng ý thì bấm vào nút
                    <strong>Cho vào giỏ hàng</strong> để chọn số lượng muốn mua (1, 2 sản phẩm hoặc nhiều hơn).</p>
                <img src="{{ asset('./images/site/hd-1.png') }}" height="250px" width="700px" alt="">
                <p>Hoặc bấm vào khu vực trong khung màu xanh để xem chi tiết của sản phẩm.</p>
                <img src="{{ asset('./images/site/hd-2.png') }}" height="350px" width="700px" alt="">
                <div style="height:15px"></div>
                <p><strong>Bước 2</strong>: Sau đó, bấm ô
                    <strong>Cho vào giỏ</strong>, sản phẩm sẽ được cho vào giỏ hàng của Mẹ.</p>.
                <img src="{{ asset('./images/site/hd-3.png') }}" height="200px" width="700px" alt="">
                <div style="height:8px"></div>
                <p><strong><br>Bước 3</strong>: Nếu muốn mua thêm sản phẩm, Mẹ bấm vào dòng Tiếp tục mua hàng.</p>
                <div style="height:15px"></div>

                <p><strong class="combine">II. THANH TOÁN</strong></p>
                <div style="height:15px"></div>
                <p><strong>Bước 4</strong>:
                    Khi muốn thanh toán, Mẹ kiểm tra lại giỏ hàng (sản phẩm, số lượng, đơn giá…) cho chính xác.</p>
                <p><strong><br/>Bước 5</strong>: Bấm vào ô <strong>Thanh toán.</strong></p>
                <p><strong><br>Bước 6</strong>: Mẹ nhớ cung cấp đầy đủ thông tin để Combine giao hàng, gồm có:</p>
                <p>+ Đầu tiên cần lưu ý là phải đăng nhập vào hệ thống của Combine.</p>
                <p>+ Họ tên.</p>
                <p>+ Thành phố đang sống.</p>
                <p>+ Địa chỉ nơi đang sống: số nhà (tổ), tên đường (ấp), phường (xã), quận (huyện).</p>
                <p>+ Số điện thoại.</p>
                <p>+ Địa chỉ giao hàng nếu không muốn giao hàng đến địa chỉ mặc định theo địa chỉ khi đăng kí tài khoản.<br><br>
                </p>
                <img src="{{ asset('./images/site/hd-4.png') }}" height="400px" width="700px" alt="">
                <div style="height:15px"></div>
                <p><strong>Bước 7</strong>: Nếu Mẹ đã hài lòng với đơn hàng, bấm vào <strong>Đặt hàng</strong>. Combine
                    sẽ xác
                    nhận đặt hàng thành công.</p>
            </div>
        </div>
    </div>
@endsection
