@extends('frontend.base.base')

@section('title','Bảo mật')

@section('main')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Chính sách bảo mật</span></li>
                </ul>
            </div>
        </div>

        <div class="container pb-60">
            <div class="row">
                <div class="col-md-2 ml-5">
                    @include('frontend.post.partials.link')
                </div>
                <div class="col-md-8">
                    <div style="line-height:20px">
                        <div style="margin-left:230px"><img src="{{ asset('./images/site/chinhsachbaomat.png') }}">
                        </div>
                        <div style="height:30px"></div>
                        <h4>
                            <strong>Chính sách bảo mật</strong></h4>
                        <br/>
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">
                        Sự riêng tư của khách hàng vô cùng quan trọng đối với Cửa hàng mở Bé Yêu.
                        </span><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Chúng tôi chỉ sử dụng
                        tên và một số thông tin khác của Quý khách theo cách được đề ra trong Chính sách Bảo mật này.
                        Chúng tôi chỉ sẽ thu thập những thông tin cần thiết và có liên quan đến giao dịch giữa chúng tôi và Quý khách.</span>
                        </p>
                        <div style="height:15px"></div>
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">
                        Chúng tôi chỉ giữ thông tin của Quý khách trong thời gian luật pháp yêu
                        cầu hoặc cho mục đích mà thông tin đó được thu thập.</span></p>
                        <div style="height:15px"></div>
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">
                        Quý khách có thể ghé thăm trang web mà không cần phải cung cấp bất kỳ thông tin cá nhân nào.
                        Khi viếng thăm trang web,
                        Quý khách sẽ luôn ở trong tình trạng vô danh trừ khi Quý khách có tài khoản trên trang web và
                        đăng nhập vào bằng tên truy cập và mật khẩu của mình.</span></p>
                        <div style="height:15px"></div>
                        <p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">
                        Nếu quý khách có ý kiến hay đóng góp hay thắc mắc gì xin vui lòng gửi email tới
                        <em>hotro@beyeushop.com </em> hoặc gọi vào hotline 08 73099937.
                        Chúng tôi luôn sẵn sàng lắng nghe nhận xét của Quý khách.</span></p>
                    </div>
                </div>
            </div>
        </div><!--end container-->

    </main>
@endsection
