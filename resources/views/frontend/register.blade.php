@extends('frontend.base.base')

@section('title','Đăng ký')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">home</a></li>
                    <li class="item-link"><span>Đăng ký</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                <form method="post" action="{{ route('register-store') }}" autocomplete="off"
                                      class="form-stl"
                                      name="frm-login">
                                    @csrf
                                    @include('frontend.base.message')
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Tạo tài khoản</h3>
                                        <h4 class="form-subtitle">Thông tin tài khoản</h4>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Họ và tên</label>
                                        <input type="text" id="frm-reg-lname" name="name" placeholder="Họ và tên">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email</label>
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Email">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-phone">Số điện thoại</label>
                                        <input type="text" id="frm-reg-phone" name="phone" placeholder="Số điện thoại">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-address">Địa chỉ</label>
                                        <input type="text" id="frm-reg-address" name="address" placeholder="Địa chỉ">
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item">
                                        <label for="frm-reg-address">Giới tính</label>
                                        <br>
                                        <label for="nam"><input class="form-check-input" type="radio" id="nam" value="4"
                                                                name="gender">Nam</label>
                                        <label for="nu"><input class="form-check-input" type="radio" id="nu" value="5"
                                                               name="gender">Nữ</label>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="area_id">Tỉnh</label>
                                        <br>
                                        <select name="area_id" id="area_id">
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Login Information</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-account">Tài khoản *</label>
                                        <input type="text" id="frm-reg-account" name="account" placeholder="Tài khoản">
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Mật khẩu *</label>
                                        <input type="text" id="frm-reg-cfpass" name="password"
                                               placeholder="************">
                                    </fieldset>
                                    <input type="submit" class="btn btn-sign" value="Đăng ký" name="Register">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->
        </div>
    </main>
@endsection
