@extends('frontend.base.base')

@section('title','Đổi trả')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Câu hỏi thường gặp</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-2 ml-5">
            @include('frontend.post.partials.link')
        </div>
        <div class="col-md-8">
            <h3 class="combine">Giới thiệu chung</h3>
            <p><strong>Combine là Cửa hàng mở</strong> chuyên cung cấp những mặt hàng chính hãng đồ chơi dành cho bé,
                những
                sản phẩm được các ông bố bà mẹ tin dùng. Sản phẩm của Bé Yêu được nhập từ những nhà phân phối và các
                thương
                hiệu có uy tín trên thị trường, được sàng lọc kĩ càng về chất lượng để đảm bảo cho sức khoẻ và sự phát
                triển
                về trí tuệ của con bạn.</p>
            <div style="height:15px"></div>
            <p>Sự hài lòng của bạn là luôn tiêu chí số một của Combine.Combine hiểu rằng nhu cầu chăm sóc con của mỗi
                gia
                đình đều khác biệt, chính vì vậy chúng tôi luôn tìm kiếm những mặt hàng mới để đáp ứng những nhu cầu
                riêng
                biệt của gia đình bạn.</p>
            <div style="height:15px"></div>
            <p><span style="color: #00ccff; font-size: medium;"><strong>Cách giao nhận hàng</strong></span></p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>1. Phương thức giao nhận hàng của Combine là như thế nào?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p><strong>Bước 1:&nbsp;</strong></p>
            <p>Sau khi đặt mua đơn hàng thành công, Khách hàng sẽ nhận được thông tin xác nhận đơn hàng
                của&nbsp;Combine.</p>
            <div style="height:15px"></div>
            <p><strong>Bước 2:&nbsp;</strong></p>
            <p>Nhân viên chăm sóc khách hàng của Combine sẽ liên hệ với Khách hàng qua điện thoại để xác nhận thông tin
                đơn
                hàng, địa chỉ và thời gian giao nhận hàng.</p>
            <div style="height:15px"></div>
            <p><strong>Bước 3:&nbsp;</strong></p>
            <p>Nhân viên giao hàng&nbsp;sẽ liên hệ với Khách hàng qua điện thoại để hẹn thời gian trước khi đến giao
                hàng.</p>
            <div style="height:15px"></div>
            <p><strong>Bước 4:&nbsp;</strong></p>
            <p>Tại địa điểm nhận hàng, Khách hàng kiểm tra lại đơn hàng và sản phẩm trước khi ký xác nhận vào Phiếu Giao
                Hàng.</p>
            <p>(Nếu Khách hàng chọn hình thức&nbsp;"Thanh toán trực tiếp khi nhận hàng"&nbsp;thì có thể thanh toán trực
                tiếp
                cho nhân viên giao hàng)</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>2.&nbsp;Chi phí vận chuyển là bao nhiêu?</strong></span></p>
            <div style="height:15px"></div>
            <strong>Đối với đơn hàng có tổng giá trị thanh toán &gt;&nbsp;<strong>100.000 đồng,</strong></strong>&nbsp;Combine&nbsp;<strong>miễn
                phí vận chuyển toàn quốc</strong>&nbsp;cho khách hàng
            <div style="height:15px"></div>
            Đối với đơn hàng có tổng giá trị thanh toán dưới 100.000 đồng, quý khách vui&nbsp; lòng thêm phí vận
            chuyển
            như sau:
            <div style="height:15px"></div>
            Khu vực TP.Hà Nội: 10.000 đồng
            <div style="height:15px"></div>
            Các khu vực khác: 30.000 đồng
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>3.&nbsp;</strong><strong>Vận chuyển hàng sẽ mất bao lâu?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>Thời gian vận chuyển tùy vào khu vực tính theo các ngày ngày làm việc.</p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>4. Làm cách nào để tôi kiểm tra tình trạng đơn hàng của mình?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>Quý khách vui lòng gọi vào số 08 73099937 hoặc email chúng tôi tại hotro@combine.com để chúng tôi có
                thể
                cập nhật tình trạng đơn hàng cho Quý khách.</p>
            <p><strong><br></strong></p>
            <p><span style="color: #00ccff; font-size: medium;"><strong>Phương thức thanh toán</strong></span></p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>1.&nbsp;Những hình thức thanh toán nào được công ty chấp nhận?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p><span>Combine chấp nhận thanh toán trực tiếp khi nhận hàng (COD),và chuyển khoản ngân hàng.Các hình thức thanh toán khác sẽ được Bé Yêu triển khai trong thời gian tới.&nbsp;</span>
            </p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>2.&nbsp;Giá của cửa hàng đã có kèm thuế chưa?</strong></span></p>
            <div style="height:15px"></div>
            <p>Giá của cửa hàng đã có kèm thuế VAT.</p>
            <p>&nbsp;</p>
            <p><span
                    style="color: #00ccff; font-size: medium;"><strong>Cách đổi trả hàng</strong><strong>&nbsp;</strong></span>
            </p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>1. Các trường hợp nào được đổi trả hàng?</strong></span></p>
            <div style="height:15px"></div>
            <p><strong>&nbsp;Combine chấp nhận đổi trả tất cả các mặt hàng.&nbsp;</strong>Quý khách có thể đổi trả
                hàng trong những trường hợp sau:</p>
            <p>a. Các trường hợp được trả hàng</p>
            <div style="height:15px"></div>
            Quý khách được quyền trả hàng nếu sản phẩm bị hư hỏng do nhà sản xuất hoặc trong quá trình vận chuyển giao
            hàng.
            <div style="height:15px"></div>
            Quý khách được quyền trả hàng khi phát hiện hàng nhái, hàng giả.
            <div style="height:15px"></div>
            <p>b. Các trường hợp được đổi hàng</p>
            Combine giao nhầm màu (trừ trường hợp sản phẩm được ghi chú là giao màu ngẫu nhiên), nhầm size, nhầm sản
            phẩm,
            hàng hóa bị hư hỏng trong quá trình đi giao.
            <div style="height:15px"></div>
            Hàng hóa không đúng như mô trả trên website (về màu sắc, kiểu dáng, chức năng).
            <div style="height:15px"></div>
            <div>Hàng hóa được đổi trả cần có những điều kiện sau:</div>
            <div style="height:15px"></div>
            Điều kiện về thời gian đổi trả: Trong vòng 7 ngày&nbsp;kể từ khi nhận được hàng.
            <div style="height:15px"></div>
            Điều kiện về sản phẩm: Sản phẩm nguyên tem, không bị dơ bẩn, hư hỏng, trầy xước, có mùi đã qua sử dụng hoặc
            đã
            qua giặt, tẩy. Đầy đủ các phụ kiện hoặc tặng phẩm (nếu có).
            <div style="height:15px"></div>
            Điều kiện về hóa đơn, chứng từ: Phiếu giao hàng hoặc hóa đơn đỏ (nếu có), phiếu bảo hành.
            <div style="height:15px"></div>
            Trong trường hợp đổi hàng, nếu giá món hàng đổi khác với giá món hàng đã mua, khách hàng sẽ bù thêm tiền mặt
            hoặc&nbsp;Bé Yêu sẽ hoàn tiền bằng coupon vào tài khoản khách hàng.
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>2. Tôi được đổi trả hàng trong vòng bao lâu?</strong></span></p>
            <div style="height:15px"></div>
            <p><strong></strong>Quý khách có thể đổi trả hàng trong vòng 7 ngày&nbsp;kể từ khi nhận được hàng.&nbsp;
            </p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>3. Hàng hóa được đổi trả phải trong điều kiện như thế nào?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>Sản phẩm được đổi trả phải:</p>

            Còn nguyên tem, không bị dơ bẩn, hư hỏng, trầy xước, có mùi đã qua sử dụng hoặc đã qua giặt, tẩy.
            <div style="height:15px"></div>
            Còn đầy đủ các phụ kiện hoặc tặng phẩm (nếu có).
            <div style="height:15px"></div>
            Còn đầy đủ phiếu giao hàng hoặc hóa đơn đỏ (nếu có), còn phiếu bảo hành.
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>4. Hàng gửi trả sẽ mất bao lâu để xử lý?</strong></span></p>
            <div style="height:15px"></div>
            <p>Sau khi đã nhận, kiểm tra và chấp nhận sản phẩm mà Quý khách trả lại, Bộ phận Hoàn Trả Sản Phẩm của Bé
                Yêu sẽ
                t
                iến hành đổi sản phẩm hoặc tiến hành cung cấp điểm tín dụng vào tài khoản của khách hàng trong vòng
                1-2
                ngày làm việc.</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>5.&nbsp;Chi phí cho việc gửi trả hàng là bao nhiêu?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>Chúng tôi không tính phí khi Quý khách gửi trả hàng. Quý khách vui lòng chịu phí chuyển hàng từ đơn vị
                vận
                chuyển (nếu có) khi gửi trả hàng cho Bé Yêu.</p>
            <div style="height:15px"></div>
            <p><span style="color: #99cc00;"><strong>6. Tôi có được hoàn tiền hoặc đổi hàng nếu tôi chọn nhầm kích cỡ/màu/kiểu?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>Quý khách có thể đổi kích cỡ/màu/ kiểu nếu chọn nhầm. Combine không hoàn lại tiền cho Quý khách
                trong
                trường hợp này. Nếu có chênh lệch về giá cả giữa món hàng đã mua và món hàng muốn đổi, Bé Yêu sẽ
                cung
                cấp điểm tín dụng vào tài khoản của Khách hàng.</p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>7. Tôi có được hoàn tiền nếu tôi không thích sản phẩm đã nhận?</strong></span>
            </p>
            <div style="height:15px"></div>
            <p>&nbsp;Combine sẽ không hoàn lại tiền cho Quý khách trong trường hợp này.</p>
            <p><span style="color: #99cc00;"><strong>8. Những mặt hàng nào được đổi trả?</strong></span></p>
            <div style="height:15px"></div>
            <p>&nbsp;Combine chấp nhận đổi trả tất cả các mặt hàng.</p>
            <div style="height:15px"></div>
            <p><span
                    style="color: #99cc00;"><strong>9.&nbsp;</strong><strong>Quy trình đổi trả hàng là như thế nào?</strong>&nbsp;</span>
            </p>
            <div style="height:15px"></div>
            <p><strong>Bước 1:&nbsp;</strong></p>
            <p>Liên hệ Hotline: 08 73099937 hoặc gửi email về địa chỉ <em>hotro@combine.com</em> để thông báo về yêu cầu
                đổi, trả hàng.</p>
            <div style="height:15px"></div>
            <p><strong>Bước 2:&nbsp;</strong></p>
            <div style="height:15px"></div>
            <p>Quý khách gởi trả sản phẩm còn nguyên bao bì cùng các giấy tờ như sau:</p>
            <div style="height:15px"></div>
            Phiếu giao hàng hoặc hóa đơn giá trị gia tăng (nếu có)
            <div style="height:15px"></div>
            Phiếu hoàn trả sản phẩm đã được điền đầy đủ thông tin
            <div style="height:15px"></div>
            Bao bì có dán mã sản phẩm bên ngoài
            <div style="height:15px"></div>
            <p>đến địa chỉ::</p>
            <div style="height:15px"></div>
            19 Nguyễn Trãi Thanh Xuân Hà Nội Việt Nam.
            <div style="height:15px"></div>
            Thời gian: từ 9 giờ đến 18 giờ vào thứ 2 đến thứ 6 trong tuần.
            <div style="height:15px"></div>
            <p><strong>Bước 3:&nbsp;</strong></p>
            <div style="height:15px"></div>
            <p>Sau khi đã nhận, kiểm tra và chấp nhận sản phẩm mà Quý khách trả lại, Bộ phận Hoàn Trả Sản Phẩm của Bé
                Yêu sẽ
                tiến hành đổi sản phẩm hoặc tiến hành cung cấp điểm tín dụng vào tài khoản của khách hàng trong vòng
                1-2
                ngày làm việc.</p>
            <div style="height:15px"></div>
            <p><strong>Nếu Quý khách hàng có thêm những câu hỏi khác, xin vui lòng liên hệ Bộ phận Chăm sóc Khách hàng
                    của
                    Cửa hàng mở Combine:</strong></p>
            <div style="height:15px"></div>
            <p><strong>* Hotline: 08 73099937 </strong></p>
            <div style="height:15px"></div>
            <p><strong>* Email: <em>hotro@combine.com</em> </strong></p>
            <div style="height:15px"></div>
            <p>Trân trọng cảm ơn Quý khách hàng.</p>
            <div style="height:15px"></div>
        </div>
    </div>
@endsection
