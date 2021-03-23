@extends('frontend.base.base')

@section('title','Sửa thông tin cá nhân')

@section('main')
    <div class="main-body d-flex m-3">
        <div class="link-dinhhuong">
            <a href="{{route('home')}}">Trang chủ </a> &gt;
            <a href="{{route('profile', $user->id)}}">Trang cá nhân </a> >
            <label style="color:#777777">Sửa thông tin tài khoản</label>
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
                                    <a class="nav-link" href="{{ route('profile', $user->id) }}">
                                        <h4>Thông tin tài khoản</h4>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('edit-profile', $user->id) }}">Cập nhật thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('change-password', $user->id) }}">Thay đổi mật khẩu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-1">
                            @include('frontend.base.message')
                            <form method="post" action="{{ route('update-profile', $user->id) }}" id="profile">
                                @csrf
                                <div class="form-group row">
                                    <label for="taikhoan" class="col-3 offset-1 col-form-label">Tài khoản*</label>
                                    <div class="col-5">
                                        <input id="taikhoan" name="account" class="form-control here" disabled
                                               type="text" value="{{ $user->account }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-3 offset-1 col-form-label">Tên khách hàng</label>
                                    <div class="col-5">
                                        <input id="name" name="name" class="form-control here" type="text"
                                               value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-3 offset-1 col-form-label">Email</label>
                                    <div class="col-5">
                                        <input id="email" name="email" class="form-control here" type="email"
                                               value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sdt" class="col-3 offset-1 col-form-label">Số điện thoai</label>
                                    <div class="col-5">
                                        <input id="sdt" name="phone" class="form-control here" type="text"
                                               value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="diachi" class="col-3 offset-1 col-form-label">Địa chi</label>
                                    <div class="col-5">
                                        <input id="diachi" name="address" class="form-control here" type="text"
                                               value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gioitinh" class="col-3 offset-1 col-form-label">Giới tính</label>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="gender" id="nam"
                                               value="4" {{ $user->gender === 4 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="nam">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="gender" id="nu"
                                               value="5" {{ $user->gender === 5 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="nu">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinh" class="col-3 offset-1 col-form-label">Tỉnh</label>
                                    <div class="col-5">
                                        <select class="form-check" name="area_id" id="tinh">
                                            @foreach( $areas as $area)
                                                <option
                                                    value="{{ $area->id }}" {{ $area->id === $user->area_id ? 'selected' : '' }}>{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button form="profile" name="submit" type="submit" class="btn btn-primary">Cập
                                            nhật thông tin
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
    </div>
@endsection
