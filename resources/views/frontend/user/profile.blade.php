@extends('frontend.base.base')

@section('title','Trang cá nhân')

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <label style="color:#777777">Trang cá nhân</label>
        </div>
    </div>
    <div class="row chi-tiet mb-5">
        <div class="col-md-9 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('profile', $user->id) }}">
                                        <h4>Thông tin tài khoản</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('edit-profile', $user->id) }}">Cập nhật thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('change-password', $user->id) }}">Thay đổi mật khẩu</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('list-order', $user->id) }}">
                                        <h4>Đơn hàng</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-1">
                            @include('frontend.base.message')
                            <form class=" p-3">
                                <div class="form-group row">
                                    <label for="taikhoan" class="col-2 offset-1 col-form-label">Tài khoản*</label>
                                    <div class="col-5">
                                        <input id="taikhoan" name="taikhoan" class="form-control" disabled
                                               type="text" value="{{ $user->account }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-2 offset-1 col-form-label">Tên khách hàng</label>
                                    <div class="col-5">
                                        <input id="name" name="name" class="form-control" type="text" disabled
                                               value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-2 offset-1 col-form-label">Email</label>
                                    <div class="col-5">
                                        <input id="email" name="email" class="form-control" type="email" disabled
                                               value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sdt" class="col-2 offset-1 col-form-label">Số điện thoai</label>
                                    <div class="col-5">
                                        <input id="sdt" name="sdt" disabled class="form-control" type="text"
                                               value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="diachi" class="col-2 offset-1 col-form-label">Địa chi</label>
                                    <div class="col-5">
                                        <input id="diachi" name="diachi" disabled class="form-control" type="text"
                                               value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gioitinh" class="col-2 offset-1 col-form-label">Giới tính</label>
                                    <div class="col-5">
                                        <input id="gioitinh" name="gioitinh" disabled class="form-control" type="text"
                                               value="{{ $user->gender === 4 ? "Nam" : 'Nữ' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinh" class="col-2 offset-1 col-form-label">Tỉnh</label>
                                    <div class="col-5">
                                        <input id="tinh" name="tinh" disabled class="form-control here" type="text"
                                               value="{{ $area->name }}">
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
