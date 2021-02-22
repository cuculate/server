@extends('frontend.base.base')

@section('title','Trang Chủ')

@section('main')
    <div>
        <div class="adv adv-1 fixed-top">
            <img src="images/adv/CubicFun.png" alt="Quảng cáo">
        </div>
        <div class="adv adv-2 fixed-top">
            <img src="images/adv/CubicFun.png" alt="Quảng cáo">
        </div>
    </div>
    @include('frontend.base.partials.slide')
    <br>
    <div class="main-body d-flex">
        <div class="right-sidebar">
            <div class="body-container">
                <div>
                    <div class="sanpham-tieude">
                        <a href="{{route('hot')}}"><img src="{{ asset('./images/ico/arrow_orange.png') }}" alt=""
                                                        title="">&nbsp;&nbsp;Đồ chơi bán chạy</a>
                    </div>
                    <div class="row ml-1 mr-1">
                        @include('frontend.product.partials.prefix-sanpham')
                        @foreach($productHots->slice(0,6) as $hot)
                            <div class="hienthi-sanpham col-xl-2 col-lg-4 col-md-6 col-sm-12">
                                <div onclick="window.location='chitietsp={{$hot->id}}#xem'">
                                    <a href="{{ route('show', $hot->id) }}"><img
                                            src="images/sanpham/{{$hot->image}}" alt=""></a>
                                    <br><br>
                                    <div class="ten-sanpham">{{$hot->name}}</div>
                                    <div style="margin-top:15px;"></div>
                                    @if($hot->sale === 1)
                                        <label class="giagiam-sanpham">{{number_format($hot->old_price)}} VNĐ</label>
                                        <br>
                                        <label class="gia-sanpham">{{number_format($hot->price)}} VNĐ</label>
                                        <div
                                            class="phamtram-giamgia">{{100 -round(($hot->price / $hot->old_price)*100)}}
                                            %
                                        </div>
                                    @else
                                        <label class="giagiam-sanpham" style="visibility: hidden">{{$hot->price_sale}}
                                            VNĐ</label><br>
                                        <label class="gia-sanpham">{{number_format($hot->price)}} VNĐ</label>
                                    @endif
                                </div>
                                @if($hot->stocked > 0)
                                    <div class="add-to-cart"
                                         onclick="AddCart({{ $hot->id }})">
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

                    <div>
                        <div class="sanpham-tieude">
                            <a href="{{route('sale')}}"><img src="{{ asset('./images/ico/arrow_orange.png') }}" alt=""
                                                             title="">&nbsp;&nbsp;Đồ chơi giảm giá</a>
                        </div>
                        <div class="row ml-1 mr-1">
                            @include('frontend.product.partials.prefix-sanpham')
                            @foreach($productSales->slice(0,12) as $sale)
                                <div class="hienthi-sanpham col-xl-2 col-lg-4 col-md-6 col-sm-12">
                                    <div onclick="window.location='chitietsp={{$sale->id}}'">
                                        <a href="{{ route('show', $sale->id) }}"><img
                                                src="images/sanpham/{{$sale->image}}" alt=""></a>
                                        <br><br>
                                        <div class="ten-sanpham">{{$sale->name}}</div>
                                        <div style="margin-top:15px;"></div>
                                        @if($sale->sale === 1)
                                            <label class="giagiam-sanpham">{{number_format($sale->old_price)}}
                                                VNĐ</label>
                                            <br>
                                            <label class="gia-sanpham">{{number_format($sale->price)}} VNĐ</label>
                                            <div
                                                class="phamtram-giamgia">{{100 -round(($sale->price / $sale->old_price)*100)}}
                                                %
                                            </div>
                                        @else
                                            <label class="giagiam-sanpham"
                                                   style="visibility: hidden">{{$sale->old_price}}
                                                VNĐ</label><br>
                                            <label class="gia-sanpham">{{number_format($sale->price)}} VNĐ</label>
                                        @endif
                                    </div>
                                    @if($sale->stocked > 0)
                                        <div class="add-to-cart"
                                             onclick="AddCart({{ $sale->id }})">
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
                    </div>
                    <div>
                        <div class="sanpham-tieude">
                            <a href="{{route('new')}}"><img src="{{ asset('./images/ico/arrow_orange.png') }}" alt=""
                                                            title="">&nbsp;&nbsp;Đồ chơi mới</a>
                        </div>
                        <div class="row ml-1 mr-1">
                            @include('frontend.product.partials.prefix-sanpham')
                            @foreach($productNews->slice(0,12) as $new)
                                <div class="hienthi-sanpham col-xl-2 col-lg-4 col-md-6">
                                    <div onclick="window.location='chitietsp={{$new->id}}">
                                        <a href="{{ route('show', $new->id) }}"><img
                                                src="images/sanpham/{{$new->image}}" alt=""></a>
                                        <br><br>
                                        <div class="ten-sanpham">{{$new->name}}</div>
                                        <div style="margin-top:15px;"></div>
                                        @if($new->sale === 1)
                                            <label class="giagiam-sanpham">{{number_format($new->old_price)}}
                                                VNĐ</label>
                                            <br>
                                            <label class="gia-sanpham">{{number_format($new->price)}} VNĐ</label>
                                            <div
                                                class="phamtram-giamgia">{{100 -round(($new->price / $new->old_price)*100)}}
                                                %
                                            </div>
                                        @else
                                            <label class="giagiam-sanpham"
                                                   style="visibility: hidden">{{$new->old_price}}
                                                VNĐ</label><br>
                                            <label class="gia-sanpham">{{number_format($new->price)}} VNĐ</label>
                                        @endif
                                    </div>
                                    @if($new->stocked > 0)
                                        <div class="add-to-cart"
                                             onclick="AddCart({{ $new->id }})">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

