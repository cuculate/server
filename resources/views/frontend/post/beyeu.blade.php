@extends('frontend.base.base')

@section('title','Bé yêu')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Bé yêu là gì</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-2 ml-5">
            @include('frontend.post.partials.link')
        </div>
        <div class="col-md-8">
            <h3 class="combine">Combine - Nuôi lớn những yêu thương</h3>
            <br>
            <p><span style="font-size: small;">Mọi trẻ em đều cần được chăm sóc và yêu thương.
		Tình thương yêu của cha mẹ và những người thân yêu chính là niềm vui mang lại tiếng cười
		tuyệt vời nhất để bé được lớn lên và trưởng thành một cách trọn vẹn, hành phúc.</span></p>
            <div style="height:15px"></div>
            <p>
                <span style="font-size: small;">
                    <strong>
                        <em style="font-size: small;">Combine</em>
                    </strong>
		            <strong>– Cửa hàng mở của cộng đồng</strong>
                    với tiêu chí trở thành người bạn đồng hành với tình
                    yêu thương của bạn,mang đến một nguồn đồ chơi đa dạng, phong phú nhất dành cho
                    Combine ngay từ những năm tháng đầu tiên: Giúp phát triển cho trí não, cho thể chất, và cho sự phát triển toàn
                    diện của bé trong sự chăm lo chu đáo của bạn.
                </span>
            </p>
            <br>
            <p>
                <span style="font-size: small;">Không chỉ thế,
                    <strong>
                        <em>Combine</em>
                    </strong>
                    còn bên cạnh mọi gia đình trong việc chăm sóc sức khỏe và vệ sinh an toàn cho bé với những sản phẩm
		            đồ chơi đạt tiêu chuẩn quốc tế,nhưng không thiếu phần tiện nghi…
                </span>
            </p>
            <br>
            <p>
                <span style="font-size: small;">
                    <strong>
                        <em>Combine</em>
                    </strong>
                    tập trung cung cấp những sản phẩm chính hãng,
		            được các ông bố bà mẹ tin dùng. Sản phẩm của
                    <strong>
                        <em>Combine</em>
                    </strong> là các thương hiệu có uy tín trên thị
		            trường, nhập khẩu chính thức bởi các nhà phân phối tại Việt Nam, được sàng lọc kĩ càng về chất lượng để đảm bảo cho
		            sức khoẻ và sự phát triển về trí tuệ, thể chất của con bạn.
                </span>
            </p>
            <div style="height:15px"></div>
            <p>
                <span style="font-size: small;">
                    Cùng Combine
                    <strong>
                        <em>nuôi lớn những yêu thương!</em>
                    </strong>
                </span>
            </p>
            <p>
                <span style="font-size: small;">
                    Giải đáp mọi thắc mắc qua
                    <strong>Email:</strong>
		        <a href="mailto:hotro@combine.com">hotro@combine.com</a> hoặc <strong>Hotline: 08 73099937</strong>.
                </span>
            </p>
        </div>
    </div>
@endsection
