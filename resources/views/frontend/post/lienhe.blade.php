@extends('frontend.base.base')

@section('title','Liên hệ')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Liên hệ hợp tác</span></li>
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
                        <div style="margin-left:230px">
                            <img src="{{ asset('./images/site/lienhehoptac.png') }}">
                        </div>
                        <div style="height:30px"></div>
                        <h4>
                            <strong class="combine">THÔNG TIN HỢP TÁC</strong></h4>
                        <br/>
                        <p style="padding:5px">
                            Bé Yêu luôn tìm kiếm những thương hiệu mới, sản phẩm mới phù hợp nhu cầu thói quen và đặt an toànx
                            cho bé lên
                            hàng đầu. Nếu bạn là đơn vị kinh doanh, nhà cung cấp, nhà sản xuất, nhà phân phối chính thức của
                            những sản
                            phẩm dụng cụ chăm sóc bé, đồ chơi giáo dục, sách thiếu nhi... hãy liên hệ với chúng tôi.
                        </p>

                        <br/>
                        <p>
                            Hãy cùng Bé Yêu tạo ra một cửa hàng online đa dạng, phong phú với những sản phẩm chất lượng có giá
                            thành tốt
                            nhất trên thị trường, đáp ứng mọi nhu cầu vui chơi của bé, để các bà mẹ yên tâm mua sắm và chăm sóc
                            nuôi dạy
                            trẻ.
                        </p>
                        <br/>
                        <p>

                            Ngoài ra, nếu khách hàng của Bé Yêu muốn mua hàng với số lượng lớn, Bé Yêu chắc chắn sẽ có chế độ ưu
                            đãi đặc
                            biệt để khách hàng tiết kiệm chi phí mua sắm cho gia đình mình.</p><br>
                        <p>
                            Để biết thêm chi tiết, vui lòng liên hệ:
                        </p>
                        <br>

                        <h5>Bộ phận Procurement:</h5>
                        <br/>
                        <div style="margin-left:350px">
                            Mr. Tô Mạnh – Assistant to Procurement Manager
                            <br/>
                            <br/>
                            Email:<label style="color:#ec89b7"> admin@beyeushop.com</label>
                            <br/>
                            <br/>
                            Mobile: 0588 080 883
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

    </main>
@endsection
