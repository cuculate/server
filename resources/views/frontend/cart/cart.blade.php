@extends('frontend.base.base')

@section('title','Giỏ hàng')

@section('js')
    <script src="{{ asset('./js/cart.js') }}"></script>
    <script src="{{ asset('./js/list-cart.js') }}"></script>
@endsection

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Giỏ hàng</label>
        </div>
    </div>
    <div class="row" id="cart-show">
        @include('frontend.cart.partials.cart')
    </div>

@endsection
