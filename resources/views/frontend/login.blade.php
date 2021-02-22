@extends('frontend.base.base')

@section('title','Đăng nhập')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
@endsection

@section('main')
    <div class="row form mt-5" style="min-height: 500px">
        <div class="col-md-4 offset-4">
            <h1>Đăng nhập</h1>
            <form method="post" class="login-form" autocomplete="off" action="{{ route('auth') }}">
                @csrf
                @include('frontend.base.message')
                <input type="text" class="form-control" id="account" name="account" placeholder="Tài khoản">
                <div class="input-icon">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Mật khẩu">
                    <i class="fa fa-eye show-password"></i>
                </div>
                <a href="{{ route('forgot-password') }}" class="text-center">Quên mật khẩu?</a>
                <br>
                <a href="{{ route('register') }}" class="text-center">Đăng ký tài khoản</a>
                <button class="m-3">Đăng nhập</button>
            </form>
        </div>
    </div>
    <script>
        window.addEventListener("load", function () {
            const loginForm = document.querySelector(".login-form");
            const showPasswordIcon =
                loginForm && loginForm.querySelector(".show-password");
            const inputPassword =
                loginForm && loginForm.querySelector('input[type="password"');
            showPasswordIcon.addEventListener("click", function () {
                const inputPasswordType = inputPassword.getAttribute("type");
                inputPasswordType === "password"
                    ? inputPassword.setAttribute("type", "text")
                    : inputPassword.setAttribute("type", "password");
            });
        });
    </script>
@endsection
