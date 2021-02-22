@extends('frontend.base.base')

@section('title','Quên mât khẩu')

@section('css')
    <link rel="stylesheet" href="{{ asset('./css/forgot-password.css') }}">
@endsection

@section('main')
    <div class="row form" style="min-height: 500px">
        <div class="col-md-6 offset-3">
            <h1>Quên mật khẩu</h1>
            <form method="post" action="{{ route('reset-mail') }}">
                @csrf
                @include('frontend.base.message')
                <div class="form">
                    <input type="email" class="form-input" placeholder="Điền email của bạn" />
                    <button class="form-button">Gửi email</button>
                </div>
            </form>
        </div>
    </div>
@endsection
