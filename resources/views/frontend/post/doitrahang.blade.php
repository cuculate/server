@extends('frontend.base.base')

@section('title','Đổi trả')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Chính sách đổi trả hàng</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-2 ml-5">
            @include('frontend.post.partials.link')
        </div>
        <div class="col-md-8">
            <h3 class="combine">Trường hợp được đổi trả hàng</h3>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>1. Các trường hợp trả hàng</strong></span></p>
            <div style="height:15px"></div>
            Quý khách được quyền trả hàng nếu sản phẩm bị hư hỏng do nhà sản xuất hoặc trong quá trình vận chuyển giao
            hàng.<br/>
            Quý khách được quyền trả hàng khi phát hiện hàng nhái, hàng giả (có kèm theo chứng từ).
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>2. Các trường hợp đổi hàng:</strong></span></p>
            <div style="height:15px"></div>
            Combine giao nhầm màu, nhầm size, nhầm sản phẩm, hàng hóa bị hư hỏng trong quá trình đi giao.
            <div style="height:15px"></div>
            Hàng hóa không đúng như mô trả trên website (về màu sắc, kiểu dáng, chức năng, xuất xứ, nơi sản xuất).
            <div style="height:15px"></div>
            <p><strong><em>Ngoài ra, chúng tôi không giải quyết các trường hợp đổi/trả đối với các mặt hàng có kèm quà
                        tặng hoặc được khuyến mãi.</em></strong></p>
            <div style="height:15px"></div>
            <p><span style="color: #08e3f6;"><strong>Mặt hàng không áp dụng đổi trả</strong></span></p>
            <div style="height:15px"></div>
            <p>Chúng tôi chấp nhận đổi trả tất cả các mặt hàng (trừ các mặt hàng có kèm quà tặng hoặc được khuyến
                mãi)</p>
            <div style="height:15px"></div>
            <p><span style="color: #08e3f6;"><strong>Điều kiện – thời gian đổi trả hàng</strong></span></p>
            <div style="height:15px"></div>
            Điều kiện về thời gian đổi trả:&nbsp;<strong>Trong vòng 03 ngày</strong> từ kể từ khi nhận được hàng, Khách
            hàng có thể yêu cầu đổi/trả sản phẩm; và <strong>trong vòng 07 ngày</strong> kể từ khi nhận được hàng, Sản
            phẩm phải được gửi trả lại.
            <div style="height:15px"></div>
            Việc xác định thời gian khách hàng nhận được sản phẩm căn cứ theo ghi chú của nhân viên trên phiếu giao hàng
            hoặc dấu bưu điện nếu gửi đi tỉnh.
            <div style="height:15px"></div>
            Điều kiện về sản phẩm: sản phẩm nguyên tem, không bị dơ bẩn, hư hỏng, trầy xước, có mùi, đã qua sử dụng hoặc
            đã qua giặt, tẩy. Đầy đủ các phụ kiện hoặc tặng phẩm (nếu có).
            <div style="height:15px"></div>
            Đối với nhóm hàng cồng kềnh: xe đẩy trẻ em, nôi cũi, tủ nhựa, xe nhún ăn bột, xe tập đi, ghế ngồi ô tô, ghế
            ngồi ăn, điều kiện đổi trả hàng nguyên đai, nguyên kiện tức là sản phẩm vẫn còn nguyên thùng, chưa đóng
            thành thành phẩm, nếu đã đóng thành rồi thì sẽ không hợp lệ với điều khoản đổi trả hàng.
            <div style="height:15px"></div>
            Đối với các mặt hàng: trợ ty, núm ty, bình sữa không hợp lệ đổi trả sản phẩm khi bé đã bú thử.
            <div style="height:15px"></div>
            Điều kiện về hóa đơn, chứng từ: phiếu giao hàng hoặc hóa đơn đỏ (nếu có), phiếu bảo hành.
            <div style="height:15px"></div>
            <p><span style="color: #08e3f6;">&nbsp;<strong>Quy trình đổi trả hàng:</strong></span></p>
            <div style="height:15px"></div>
            <p>Trong vòng 07 ngày kể từ ngày nhận hàng, quý khách xác nhận đổi/trả hàng và gửi trả hàng theo các bước
                sau:</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong><em>Bước 1</em></strong>:</span> &nbsp;Khách hàng thông báo với
                Combine về yêu cầu và nguyên nhân đổi/trả hàng thông qua các kênh hỗ trợ dưới đây trong vòng 03 ngày đầu
                kể từ ngày nhận hàng</p>
            <div style="height:15px"></div>
            Hotline: 08 73099937
            <div style="height:15px"></div>
            Email về địa chỉ&nbsp;<em>hotro@combine.com</em>&nbsp;
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong><em>Bước 2: </em></strong></span>Điền đầy đủ thông tin mẫu phiếu
                đăng ký đổi trả.</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong><em>Bước 3:</em></strong></span> Đóng gói sản phẩm còn nguyên bao
                bì cùng các giấy tờ như sau:</p>
            <div style="height:15px"></div>
            Phiếu giao hàng hoặc hóa đơn giá trị gia tăng (nếu có)
            <div style="height:15px"></div>
            Bao bì có dán mã sản phẩm bên ngoài.
            <div style="height:15px"></div>
            Phiếu đăng ký đổi trả
            <div style="height:15px"></div>
            <p><strong>gửi bưu điện về địa chỉ đã in trên nhãn đổi trả của Combine</strong>:</p>
            <div style="height:15px"></div>
            <p>19 Nguyễn Trãi Thanh Xuân Hà Nội Việt Nam.</p>
            <div style="height:15px"></div>
            <p>&nbsp;</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong><em>Bước 4:</em></strong></span> Sau khi đã nhận, kiểm tra và chấp
                nhận sản phẩm mà Quý khách trả lại, Bộ Phận Hoàn Trả Sản Phẩm của Bé Yêu sẽ tiến hành đổi sản phẩm
                hoặc tiến hành cung cấp điểm tín dụng vào tài khoản của khách hàng trong vòng 1-2 ngày làm việc.</p>
            <div style="height:15px"></div>
        </div>
    </div>
@endsection
