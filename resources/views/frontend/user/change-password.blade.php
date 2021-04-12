@extends('frontend.base.base')

@section('title','Sửa thông tin cá nhân')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">Home</a></li>
                    <li class="item-link"><a href="{{ route('profile', $user->id) }}">Trang cá nhân </a></li>
                    <li class="item-link"><span>Thay đổi mật khẩu</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                @include('frontend.base.message')
                                <form method="post" action="{{ route('update-password', $user->id) }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="old-mkKh" class="col-2 offset-1 col-form-label">Mật khẩu cũ</label>
                                        <div class="col-5">
                                            <input id="old-mkKh" name="old-password" class="form-control here"
                                                   type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mkKh" class="col-2 offset-1 col-form-label">Mật khẩu mới</label>
                                        <div class="col-5">
                                            <input id="mkKh" name="password" class="form-control here" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="re-mkKh" class="col-2 offset-1 col-form-label">Xác nhận lại mật khẩu
                                            mới </label>
                                        <div class="col-5">
                                            <input id="re-mkKh" name="re-password" class="form-control here"
                                                   type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Thay đổi mật
                                                khẩu
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->

                @include('frontend.user.partials.left-menu')
            </div>
        </div>
    </main>
@endsection
