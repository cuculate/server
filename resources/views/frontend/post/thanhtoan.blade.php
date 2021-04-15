@extends('frontend.base.base')

@section('title','Thanh toán')

@section('main')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Phương thức thanh toán</span></li>
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
                        <h3 class="combine">Hiện tại Bé Yêu chỉ chấp nhận hình thức thanh toán sau:</h3>
                        <div style="height:15px"></div>
                        <p><strong style="color:#99cc00">Thanh toán trực tiếp khi nhận hàng (COD)</strong>, khách hàng có thể
                            thanh
                            toán trực tiếp cho nhân viên giao hàng khi nhận hàng.</p>
                        <div style="height:15px"></div>
                    </div>
                    <strong style="color:#99cc00">Thanh toán bằng chuyển khoản qua ngân hàng</strong>
                    <div style="height:15px"></div>
                    <p>Chuyển khoản qua ngân hàng và thanh toán bằng thẻ ATM</p>
                    <div style="height:15px"></div>
                    Quý khách thanh toán bằng hình thức chuyển khoản, xin vui lòng chuyển tiền đến công ty chúng tôi theo các
                    tài khoản
                    dưới đây. Khi nhận được thông báo của ngân hàng, chúng tôi sẽ thực hiện đơn đặt mua hàng của Quý khách.
                    <div style="height:15px"></div>
                    Các tài khoản chấp nhận thanh toán:
                    <div style="height:15px"></div>
                    <strong>Ngân hàng Công thương Việt Nam (INCOMBank - ICB) - Hà Nội</strong>
                    <div style="height:15px"></div>
                    Số tài khoản: 711A08522308
                    <div style="height:15px"></div>
                    Chủ tài khoản: Nguyễn Văn A
                    <div style="height:15px"></div>
                    <strong>Ngân hàng Việt Nam Techcombank :</strong>
                    <div style="height:15px"></div>
                    Số tài khoản: 11520128094011
                    <div style="height:15px"></div>
                    Chủ tài khoản: Nguyễn Văn A
                    <div style="height:15px"></div>
                    <strong>Ngân hàng Đầu tư và Phát triển Việt Nam - BIDV</strong>
                    <div style="height:15px"></div>
                    Số tài khoản: 22010000142330
                    <div style="height:15px"></div>
                    Chủ tài khoản: Nguyễn Văn A
                    <div style="height:15px"></div>
                    <strong>Ngân hàng Á Châu (ACB)</strong>
                    <div style="height:15px"></div>
                    Số tài khoản: 4214943511689916
                    <div style="height:15px"></div>
                    Chủ tài khoản: Nguyễn Văn A
                    <div style="height:15px"></div>
                    <p><strong><span style="font-size: medium; color: #00ccff;">Các hình thức thanh toán khác sẽ được Bé Yêu&nbsp;triển khai trong thời gian gần nhất:</span></strong>
                    </p>
                    <div style="height:15px"></div>
                    Thanh toán bằng hệ thống Bảo Kim và Ngân Lượng
                    <div style="height:15px"></div>
                    Thanh toán bằng thẻ ATM
                    <div style="height:15px"></div>
                    Thanh toán bằng thẻ Visa/ Master

                </div>
            </div>
        </div><!--end container-->

    </main>
@endsection
