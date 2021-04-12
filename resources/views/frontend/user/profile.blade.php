@extends('frontend.base.base')

@section('title','Trang cá nhân')

@section('main')
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{ route('home') }}" class="link">Home</a></li>
                    <li class="item-link"><span>Trang cá nhân</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                @include('frontend.base.message')
                                <form class=" p-3">
                                    <div class="form-group row">
                                        <label for="account" class="col-2 offset-1 col-form-label">Tài
                                            khoản*</label>
                                        <div class="col-5">
                                            <input id="account" name="account" class="form-control" disabled
                                                   type="text" value="{{ $user->account }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 offset-1 col-form-label">Tên khách
                                            hàng</label>
                                        <div class="col-5">
                                            <input id="name" name="name" class="form-control" type="text"
                                                   disabled
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-2 offset-1 col-form-label">Email</label>
                                        <div class="col-5">
                                            <input id="email" name="email" class="form-control" type="email"
                                                   disabled
                                                   value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-2 offset-1 col-form-label">Số điện
                                            thoai</label>
                                        <div class="col-5">
                                            <input id="phone" name="phone" disabled class="form-control" type="text"
                                                   value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-2 offset-1 col-form-label">Địa
                                            chi</label>
                                        <div class="col-5">
                                            <input id="address" name="address" disabled class="form-control"
                                                   type="text"
                                                   value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-2 offset-1 col-form-label">Giới
                                            tính</label>
                                        <div class="col-5">
                                            <input id="gender" name="gender" disabled class="form-control"
                                                   type="text"
                                                   value="{{ $user->gender === 4 ? "Nam" : 'Nữ' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="area" class="col-2 offset-1 col-form-label">Tỉnh</label>
                                        <div class="col-5">
                                            <input id="area" name="area" disabled class="form-control here"
                                                   type="text"
                                                   value="{{ $area->name }}">
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
