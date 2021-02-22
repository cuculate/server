@extends('frontend.base.base')

@section('title','Sản phẩm')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <script src="js/image-zoom.js"></script>
@endsection

@section('js')
    <script src="js/product-show.js"></script>
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <a href="{{route('search')}}?category={{ $category->id }}"
               class="link-dinhhuong1">{{ $category->name }} </a> &gt;
            <a href="{{route('search')}}?brand={{ $brand->id }}" class="link-dinhhuong1">{{ $brand->name }}</a> &gt;
            <label style="color:#777777">{{$product->name}}</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-4 border d-flex justify-content-center">
            <div class="img-zoom-container">
                <img id="myimage" src="images/sanpham/{{$product->image}}" alt="{{$product->name}}">
                <div id="myresult" class="img-zoom-result"></div>
            </div>
        </div>
        <script>
            // Initiate zoom effect:
            imageZoom("myimage", "myresult");
        </script>
        <div class="col-md-4 ml-5">
            <div class="name">{{$product->name}}</div>
            <hr>
            <div class="mb-3 price">Giá:
                <span class="gia-sanpham">{{ number_format($product->price) }} VNĐ</span>
            </div>
            @if($product->stocked > 0)
                <div>
                    Tình trạng:
                    <span class="text-success">Còn hàng</span>
                </div>
                <div>
                    <span>Thời gian giao hàng của tỉnh:</span>
                    <select name="area" id="area">
                        <option value="0">Chọn Tỉnh</option>
                        @foreach( $areas as $area )
                            <option value="{{ $area->id }}"
                                    data-time="{{ $area->information }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <span id="time-ship" class="text-success">Chọn tỉnh để xem thời gian giao hàng.</span>
                    <div>Không bao gồm thứ 7, chủ nhật và các ngày lễ.</div>
                    <br>
                    <div class="cart p-3">
                        <div onclick="AddCart({{ $product->id }})" class="btn btn-warning">
                            <span class="text-light">THÊM VÀO GIỎ HÀNG</span>
                            <img src="images/ico/buy-ico.png" alt="buy" class="mb-1">
                        </div>
                        <div class="m-2">
                            <img src="images/ico/icon-phone.png" alt="phone">
                            Xem
                            <a href="{{ route('huong-dan') }}" class="text-success">hướng dẫn</a>
                            mua hàng
                        </div>
                    </div>
                </div>
            @else
                <div>
                    Tình trạng:
                    <span class="text-danger">Hết hàng</span>
                </div>
            @endif
        </div>
        @include('frontend.product.partials.support')
    </div>
    <div class="group-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-stacked row" role="tablist">
            <li role="presentation" class="active ml-3 mr-2"><a id="descrip"
                                                                class="btn btn-default pl-5 pr-5 btn-primary"
                                                                href="#description"
                                                                aria-controls="description"
                                                                role="tab"
                                                                data-toggle="tab">Đặc điểm nổi bật</a></li>
            <li role="presentation"><a id="detail"
                                       class="btn btn-default pl-5 pr-5"
                                       href="#profile"
                                       aria-controls="profile"
                                       role="tab"
                                       data-toggle="tab">Thông tin sản phẩm</a></li>
        </ul>
        <script>

        </script>
        <!-- Tab panes -->
        <div class="tab-content mb-5 pb-5">
            <div role="tabpanel" class="tab-pane active" id="description">
                <div class="font-weight-bold p-2">Chi tiết sản phẩm {{ $product->name }}</div>
                <hr>
                {!! $product->information !!}
                <br>
                {!! $brand->information !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="font-weight-bold p-2">Thông tin sản phẩm {{ $product->name }}</div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-bordered">
                            <tbody>
                            <tr>
                                <td>Sản xuất tại</td>
                                <td>{{ $product->made_in }}</td>
                            </tr>
                            <tr>
                                <td>Kích thước (D x R x C cm)</td>
                                <td>{{ $product->length }} x {{ $product->width }} x {{ $product->height }}</td>
                            </tr>
                            <tr>
                                <td>Chất liệu</td>
                                <td>{{ $product->material }}</td>
                            </tr>
                            <tr>
                                <td>Loại</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <td>Độ tuổi</td>
                                <td>{{ $age->name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.product.partials.feedback')
    <div class="border-top mt-3 p-2">
        <h3>Sản phẩm khác</h3>
        <div class="row ml-1 mr-1">
            @include('frontend.product.partials.prefix-sanpham')
            @foreach($productRandoms as $product)
                <div class="hienthi-sanpham col-md-3 pl-5">
                    <div onclick="window.location='chitietsp={{$product->id}}'">
                        <a href="{{ route('show',$product->id) }}#xem"><img
                                src="images/sanpham/{{$product->image}}" alt=""></a>
                        <br><br>
                        <div class="ten-sanpham">{{$product->name}}</div>
                        <div style="margin-top:15px;"></div>
                        @if($product->sale === 1)
                            <label class="giagiam-sanpham">{{number_format($product->old_price)}} VNĐ</label><br>
                            <label class="gia-sanpham">{{number_format($product->price)}} VNĐ</label>
                            <div class="phamtram-giamgia">{{100 -round(($product->price / $product->old_price)*100)}}%
                            </div>
                        @else
                            <label class="giagiam-sanpham" style="visibility: hidden">{{$product->old_price}} VNĐ</label><br>
                            <label class="gia-sanpham">{{number_format($product->price)}} VNĐ</label>
                        @endif
                    </div>
                    @if($product->stocked > 0)
                        <div class="add-to-cart"
                             onclick="AddCart({{ $product->id }})">
                            <input class="btn btn-outline-primary bg-warning" type="button"
                                   value="Cho vào giỏ">
                        </div>
                    @else
                        <div class="hethang">
                            <img src="images/site/out-of-stock.png" style="height: 20px;width: 150px;"
                                 alt="">
                        </div>

                    @endif
                </div>
            @endforeach
        </div>
@endsection

