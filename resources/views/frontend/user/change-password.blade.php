@extends('frontend.base.base')

@section('title','Sửa thông tin cá nhân')

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <a href="{{route('profile', $user->khID)}}">Trang cá nhân </a> >
            <label style="color:#777777">Thay đổi mật khẩu</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-9 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile', $user->khID) }}">
                                        <h4>Thông tin tài khoản</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('edit-profile', $user->khID) }}">Cập nhật thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('change-password', $user->khID) }}">Thay đổi mật khẩu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-1">
                            @include('frontend.base.message')
                            <form method="post" action="{{ route('update-password', $user->khID) }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="old-mkKh" class="col-2 offset-1 col-form-label">Mật khẩu cũ</label>
                                    <div class="col-5">
                                        <input id="old-mkKh" name="old-mkKh" class="form-control here"
                                               type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mkKh" class="col-2 offset-1 col-form-label">Mật khẩu mới</label>
                                    <div class="col-5">
                                        <input id="mkKh" name="mkKh" class="form-control here" type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="re-mkKh" class="col-2 offset-1 col-form-label">Xác nhận lại mật khẩu
                                        mới </label>
                                    <div class="col-5">
                                        <input id="re-mkKh" name="re-mkKh" class="form-control here"
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
    </div>
@endsection
