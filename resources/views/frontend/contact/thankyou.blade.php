@extends('frontend.base.base')

@section('title','Thank You')

@section('main')
    <main id="main" class="main-site">
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Thank You</span></li>
                </ul>
            </div>
        </div>

        <div class="container pb-60">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Cám ơn bạn đã gửi góp ý cho chúng tôi!</h2>
                    <p>Mọi góp ý của bạn đều giúp cho shop hoàn thiện hơn.</p>
                    <p>Một lần nữa xin cám ơn bạn!</p>
                    <a href="{{ route('search') }}" class="btn btn-submit btn-submitx">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div><!--end container-->
    </main>
@endsection

