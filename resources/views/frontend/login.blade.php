@extends('frontend.base.base')

@section('title','Đăng nhập')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                <form name="frm-login" method="post" class="login-form" autocomplete="off"
                                      action="{{ route('auth') }}">
                                    @csrf
                                    @include('frontend.base.message')
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Đăng nhập</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-uname">Tài khoản:</label>
                                        <input type="text" id="frm-login-uname" name="account" placeholder="Tài khoản">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">Mật khẩu:</label>
                                        <input type="password" id="frm-login-pass" name="password"
                                               placeholder="************">
                                    </fieldset>

                                    <fieldset class="wrap-input">
                                        <label class="remember-field">
                                            <input class="frm-input " name="rememberme" id="rememberme" value="forever"
                                                   type="checkbox"><span>Ghi nhớ</span>
                                        </label>
                                        <a class="link-function left-position" href="{{ route('forgot-password') }}"
                                           title="Quên mật khẩu?">Quên mật khẩu?</a>
                                        <a class="link-function left-position" href="{{ route('register') }}"
                                           title="Đăng ký">Đăng ký</a>
                                    </fieldset>
                                    <input type="submit" class="btn btn-submit" value="Đăng nhập" name="submit">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->
        </div>
    </main>
@endsection
