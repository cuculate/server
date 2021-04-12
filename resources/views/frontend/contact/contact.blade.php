@extends('frontend.base.base')

@section('title','Góp ý')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Liên hệ</span></li>
                </ul>
            </div>
            <div class="row">
                <div class=" main-content-area">
                    <div class="wrap-contacts ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-form">
                                <h2 class="box-title">Liên hệ</h2>
                                <form name="frm-contact" method="post" action="{{ route('contact') }}">
                                    @csrf
                                    <label for="name">Tên<span>*</span></label>
                                    <input type="text" value="{{ Session::has('User') != null ? Session::get('User')->name : '' }}" id="name" name="name" >

                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" value="{{ Session::has('User') != null ? Session::get('User')->email : '' }}" id="email" name="email" >

                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" value="{{ Session::has('User') != null ? Session::get('User')->phone : '' }}" id="phone" name="phone" >

                                    <label for="address">Địa chỉ</label>
                                    <input type="text" value="{{ Session::has('User') != null ? Session::get('User')->address : '' }}" id="address" name="address" >

                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="content" required></textarea>

                                    <input type="submit" name="ok" value="Gửi" >
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="contact-box contact-info">
                                <div class="wrap-map">
                                    <div class="mercado-google-maps"
                                         id="az-google-maps57341d9e51968"
                                         data-hue=""
                                         data-lightness="1"
                                         data-map-style="2"
                                         data-saturation="-100"
                                         data-modify-coloring="false"
                                         data-title_maps="Bé Yêu Shop"
                                         data-phone="0588 080 883"
                                         data-email="admin@@combine.com"
                                         data-address="TP. Ha Noi"
                                         data-longitude="105.8532606"
                                         data-latitude="21.0277722"
                                         data-pin-icon=""
                                         data-zoom="16"
                                         data-map-type="ROADMAP"
                                         data-map-height="263">
                                    </div>
                                </div>
                                <h2 class="box-title">Thông tin liên hệ</h2>
                                <div class="wrap-icon-box">

                                    <div class="icon-box-item">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Email</b>
                                            <p>admin@beyeushop.com</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Số điện thoại</b>
                                            <p>058 080 883</p>
                                        </div>
                                    </div>

                                    <div class="icon-box-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <div class="right-info">
                                            <b>Cửa hàng</b>
                                            <p>BÉ YÊU SHOP<br /> Lương Quy - Xuân Nộn - Đông Anh - Hà Nội - Việt Nam</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

            </div><!--end row-->

        </div><!--end container-->

    </main>

@endsection
