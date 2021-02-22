@extends('frontend.base.base')

@section('title','Đăng ký')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/register.css') }}">
@endsection

@section('js')
    <script src="{{ asset('./js/cart.js') }}"></script>

@section('main')
    <div class="row form" style="min-height: 500px;">
        <div class="col-md-6 offset-3">
            <div class="signup">
                <h1 class="signup-heading">Đăng ký</h1>
                <a href="#" class="signup-google">
                    <i class="fab fa-google signup-google-icon"></i>
                    <span class="signup-google-text">Đăng nhập bằng tài khoản Google</span>
                </a>
                <div class="signup-or">
                    <span class="signup-or-text">Or</span>
                </div>
                <form method="post" action="{{ route('register-store') }}" class="signup-form" autocomplete="off">
                    @csrf
                    @include('frontend.base.message')
                    <div class="form-group">
                        <label for="account">Tài khoản</label>
                        <input type="text" class="form-control" id="account" name="account"
                               placeholder="Tài khoản...">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Tên...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Mật khẩu...">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               placeholder="Số điện thoai...">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address"
                               placeholder="Địa chỉ...">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="nam" value="4" name="gender">
                            <label class="form-check-label" for="nam">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="nu" value="5" name="gender">
                            <label class="form-check-label" for="nu">Nữ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="area_id">Tỉnh</label>
                        <select name="area_id" id="area_id">
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="form-submit">Đăng ký</button>
                </form>
                <p class="signup-already">Bạn đã có tài khoản? <a href="{{ route('login') }}" class="signup-already-link">Đăng nhập</a></p>
            </div>
        </div>
    </div>
@endsection
