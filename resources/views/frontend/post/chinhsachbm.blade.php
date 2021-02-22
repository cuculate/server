@extends('frontend.base.base')

@section('title','Bảo mật')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Chính sách bảo mật</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-2 ml-5">
            @include('frontend.post.partials.link')
        </div>
        <div class="col-md-8">
            <div style="line-height:20px">
                <div style="margin-left:230px"><img src="{{ asset('./images/site/chinhsachbaomat.png') }}"></div>
                <div style="height:30px"></div>
                <h4>
                    <strong>Chính sách bảo mật</strong></h4>
                <br/>
                <p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">
		Sự riêng tư của khách hàng vô cùng quan trọng đối với Cửa hàng mở Combine.
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
				<em>hotro@combine.com </em> hoặc gọi vào hotline 08 73099937.
			    Chúng tôi luôn sẵn sàng lắng nghe nhận xét của Quý khách.</span></p>
            </div>
        </div>
    </div>
@endsection
