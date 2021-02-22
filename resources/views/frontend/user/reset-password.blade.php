@extends('frontend.base.base')

@section('title','Quên mât khẩu')

@section('main')
    <div class="col-md-9 offset-1">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <h4>Home</h4>
                                </a>
                            </li>
                            <label style="color:#777777">Thay đổi mật khẩu</label>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-3">
                        @include('frontend.base.message')
                        <form method="post" action="{{ route('update-reset-password', $id) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="password" class="col-2 offset-1 col-form-label">Mật khẩu mới</label>
                                <div class="col-5">
                                    <input id="password" name="password" class="form-control here" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="re-password" class="col-2 offset-1 col-form-label">Xác nhận lại mật khẩu
                                    mới </label>
                                <div class="col-5">
                                    <input id="re-password" name="re-password" class="form-control here"
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
        </div>
    </div>
@endsection
