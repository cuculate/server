<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Free Shipping</h4>
                            <p class="fc-desc">Miễn phí vận chuyển đơn trên 100K VNĐ</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Bảo hành</h4>
                            <p class="fc-desc">Hoàn tiền trong vòng 30 ngày</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Thanh toán an toàn</h4>
                            <p class="fc-desc">An toàn cho giao dịch trực tuyến</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Hỗ trợ trực tuyến</h4>
                            <p class="fc-desc">Chúng tôi hỗ trợ bạn 24/7</p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <!--End function info-->

        <div class="main-footer-content">

            <div class="container">

                <div class="row">

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Chi tiết liên hệ</h3>
                            <div class="item-content">
                                <div class="wrap-contact-detail">
                                    <ul>
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="contact-txt">Lương Quy - Xuân Nộn - Đông Anh - Hà Nội - Việt
                                                Nam</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="contact-txt">(+84) 588080883 </p>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="contact-txt">hotro@combine.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                        <div class="wrap-footer-item">
                            <h3 class="item-header">Đường dây nóng</h3>
                            <div class="item-content">
                                <div class="wrap-hotline-footer">
                                    <span class="desc">Hãy gọi vào số</span>
                                    <b class="phone-number">(+123) 456 789 - (+84) 588080883</b>
                                </div>
                            </div>
                        </div>

                        <div class="wrap-footer-item footer-item-second">
                            <h3 class="item-header">Đăng ký để nhận thông tin</h3>
                            <div class="item-content">
                                <div class="wrap-newletter-footer">
                                    <form action="{{ route('home') }}" class="frm-newletter" id="frm-newletter">
                                        <input type="email" class="input-email" name="email" value=""
                                               placeholder="Enter your email address">
                                        <button class="btn-submit">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                        <div class="row">
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">Giới Thiệu Chung</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                            <li class="menu-item"><a href="{{ route('post','be-yeu') }}">Bé Yêu là
                                                    gì?</a></li>
                                            <li class="menu-item"><a href="{{ route('post','huong-dan') }}">Hướng dẫn
                                                    mua hàng</a></li>
                                            <li class="menu-item"><a href="{{ route('post','faq') }}">Câu hỏi thường
                                                    gặp</a></li>
                                            <li class="menu-item"><a href="{{ route('post','lien-he') }}">Liên hệ hợp
                                                    tác</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">Chính Sách Giao Dịch</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                            <li class="menu-item"><a href="{{ route('post','chinh-sach') }}">Chính sách
                                                    bảo mật</a></li>
                                            <li class="menu-item"><a href="{{ route('post','tra-hang') }}">Chính sách
                                                    giao hàng</a></li>
                                            <li class="menu-item"><a href="{{ route('post','doi-tra-hang') }}">Chính
                                                    sách đổi trả hàng</a></li>
                                            <li class="menu-item"><a href="{{ route('post','thanh-toan') }}">Phương thức
                                                    thanh toán</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Thanh toán trực tuyến an toàn qua:</h3>
                            <div class="item-content">
                                <div class="wrap-list-item wrap-gallery">
                                    <img src="{{ asset('assets/images/payment.png') }}" style="max-width: 260px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Mạng xã hội</h3>
                            <div class="item-content">
                                <div class="wrap-list-item social-network">
                                    <ul>
                                        <li><a href="#" class="link-to-item" title="twitter"><i class="fa fa-twitter"
                                                                                                aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook"
                                                                                                 aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#" class="link-to-item" title="pinterest"><i
                                                    class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="link-to-item" title="instagram"><i
                                                    class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="link-to-item" title="vimeo"><i class="fa fa-vimeo"
                                                                                              aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Tải ứng dụng</h3>
                            <div class="item-content">
                                <div class="wrap-list-item apps-list">
                                    <ul>
                                        <li><a href="#" class="link-to-item" title="our application on apple store">
                                                <figure><img src="{{ asset('assets/images/brands/apple-store.png') }}"
                                                             alt="apple store" width="128" height="36"></figure>
                                            </a></li>
                                        <li><a href="#" class="link-to-item"
                                               title="our application on google play store">
                                                <figure><img src="{{ asset('assets/images/brands/google-play-store.png') }}"
                                                             alt="google play store" width="128" height="36"></figure>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">Copyright © 2021 Combine Media. All rights reserved</p>
                </div>
                <div class="coppy-right-item item-right">
                    <div class="wrap-nav horizontal-nav">
                        <ul>
                            <li class="menu-item"><a href="{{ route('post','be-yeu') }}" class="link-term">About us</a></li>
                            <li class="menu-item"><a href="{{ route('post','chinh-sach') }}" class="link-term">Privacy Policy</a>
                            </li>
                            <li class="menu-item"><a href="{{ route('post','faq') }}" class="link-term">Terms &
                                    Conditions</a></li>
                            <li class="menu-item"><a href="{{ route('post','doi-tra-hang') }}" class="link-term">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>
