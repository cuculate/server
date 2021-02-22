@extends('frontend.base.base')

@section('title','Sản phẩm bán chạy')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/left-menu.css') }}">
@endsection

@section('main')
    <div class="main-body d-flex">
        @include('frontend.product.partials.left-menu')
        <div class="right-sidebar">
            <div class="body-container">
                <div>
                    <h1>Sản phẩm bán chạy</h1>
                    <div class="row ml-1 mr-1">
                        @include('frontend.product.partials.prefix-sanpham')
                        @foreach($products as $product)
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
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right m-2">
                            {{$products->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

