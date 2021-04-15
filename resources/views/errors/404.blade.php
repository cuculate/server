@extends('frontend.base.base')

@section('title','404 Error Page')

@section('main')
    <main id="main" class="main-site">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>404 Error Page</span></li>
                </ul>
            </div>
            <div class="container pb-60">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Oops! Trang này không tồn tại!</h2>
                        <p>Chúng tôi không thể tìm thấy trang bạn đang tìm kiếm.</p>
                        <p>Vì vậy, bạn có thể <a href="{{ route('home') }}">quay lại Trang Chủ</a> hoặc tìm kiếm trên thanh tìm kiếm.</p>
                    </div>
                </div>
            </div><!--end container-->
        </div>
    </main>
@endsection
