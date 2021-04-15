@extends('frontend.base.base')

@section('title','Giao hàng')

@section('main')
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Chính sách giao hàng</span></li>
                </ul>
            </div>
        </div>

        <div class="container pb-60">
            <div class="row">
                <div class="col-md-2 ml-5">
                    @include('frontend.post.partials.link')
                </div>
                <div class="col-md-8">
                    <h3 class="combine">Quy trình giao nhận hàng</h3>
                    <div style="height:15px"></div>
                    <p><span style="color: #99cc00;"><strong>Bước 1:&nbsp;</strong></span></p>
                    <div style="height:15px"></div>
                    <p>Sau khi đặt mua đơn hàng thành công, Khách hàng sẽ nhận được thông tin xác nhận đơn hàng của&nbsp;Combine
                        qua Email.Thông tin về mã đơn hàng sẽ có trong email. Khách hàng cần lưu giữ có thể đối chiếu khi cần
                        thiết.<strong></strong></p>
                    <div style="height:15px"></div>
                    <p><span style="color: #99cc00;"><strong>Bước 2:&nbsp;</strong></span></p>
                    <div style="height:15px"></div>
                    <p>Nhân viên chăm sóc khách hàng của Combine sẽ liên hệ với Khách hàng qua điện thoại (lần 1) để xác nhận
                        thông tin đơn hàng, địa chỉ và thời gian giao nhận hàng.<strong></strong></p>
                    <div style="height:15px"></div>
                    <p><span style="color: #99cc00;"><strong>Bước 3:&nbsp;</strong></span></p>
                    <div style="height:15px"></div>
                    <p>Nhân viên giao hàng&nbsp;sẽ liên hệ với Khách hàng qua điện thoại (lần 2) để hẹn thời gian trước khi đến
                        giao hàng.<strong></strong></p>
                    <div style="height:15px"></div>
                    <p><span style="color: #99cc00;"><strong>Bước 4:&nbsp;</strong></span></p>
                    <div style="height:15px"></div>
                    <p>Tại địa điểm nhận hàng, Khách hàng kiểm tra lại đơn hàng và sản phẩm trước khi ký xác nhận vào Phiếu Giao
                        Hàng.</p>
                    <p>Khi nhận hàng, Khách hàng cần lưu ý thực hiện:</p>
                    <p>- Mở gói hàng và đối chiếu hàng hóa với Phiếu giao hàng</p>
                    <p>- Cầm sản phẩm kiểm tra xem có đúng sản phẩm mà Khách hàng đã đặt mua hay không</p>
                    <p>- Kiểm tra bao bì và sản phẩm có bị hư hại do quá trình vận chuyển hay không</p>
                    <p>Nếu không hài lòng với 1 trong 3 điều trên, Khách hàng có thể yêu cầu Nhân viên giao hàng xác nhận và trả
                        lại hàng.</p>
                    <p>Combine sẽ không chịu trách nhiệm giải quyết khiếu nại của Khách hàng sau khi Khách hàng đã ký nhận và
                        thanh toán.</p>
                    <p><em>Khách hàng nếu chọn hình thức&nbsp;"Thanh toán trực tiếp khi nhận hàng"&nbsp;thì có thể thanh toán
                            trực tiếp cho nhân viên giao hàng ngay sau khi nhận hàng.<br></em></p>
                    <p>&nbsp;</p>
                    <p><span style="color: #00ccff; font-size: medium;"><strong>Chi phí vận chuyển&nbsp;</strong></span></p>
                    <ul style="margin-left: 20px;color:#777777;font-family: Helvetica, Arial, sans-serif">
                        <li style="color:#777777;font-family: Helvetica, Arial, sans-serif"><strong>Miễn phí vận chuyển toàn
                                quốc</strong>&nbsp;đối với đơn hàng có tổng giá trị thanh toán từ&nbsp;<strong>100.000 đồng trở
                                lên</strong>.
                        </li>
                        <li style="color:#777777;font-family: Helvetica, Arial, sans-serif">Đối với đơn hàng có tổng giá trị
                            thanh toán dưới 100.000 đồng, quý khách vui&nbsp; lòng thêm phí vận chuyển như sau:
                            <ul style="margin-left: 20px;color:#777777;font-family: Helvetica, Arial, sans-serif">
                                <li style="color:#777777;font-family: Helvetica, Arial, sans-serif">Khu vực TP.HN: 10.000 đồng
                                </li>
                                <li style="color:#777777;font-family: Helvetica, Arial, sans-serif">Các khu vực khác: 30.000
                                    đồng
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>&nbsp;</p>
                    <p><span style="color: #00ccff; font-size: medium;"><strong>Thời gian giao nhận hàng</strong></span></p>
                    <ul style="margin-left: 20px;">
                        <li style="color:#777777;font-family: Helvetica, Arial, sans-serif">Xem chi tiết ở phần chi tiết sản
                            phẩm - thời gian sai khác với từng khu vực.Không tính thứ 7 chủ nhật và các ngày lễ.
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--end container-->

    </main>
@endsection
