<div class="user">
    <span type="button" class="btn btn-default dropdown-toggle">
        <i class='fas fa-user-alt'></i>
        @if ( Session::has("User") == null)
            <span>Tài khoản</span>
        @else
            <span>{{ Session::get('User')->name }}</span>
        @endif
    </span>
    <div class="dropdown-menu">
        @if ( Session::has("User") == null)
            <a class="btn btn-warning nav-link text-center" href="{{ route('register') }}">Đăng ký</a>
            <a class="btn btn-warning nav-link text-center" href="{{ route('login') }}">Đăng nhập</a>
            <a class="btn nav-link text-left d-flex facebook bg-light" href="{{ route('login') }}">
                <i class="fab fa-facebook social-share-icon pr-2"
                   style="color: rgb(59, 89, 152); font-size:30px; border-right: 1px solid grey; width: 36px"></i>
                <span class="social-share-text align-self-center pl-4">Đăng nhập bằng Facebook</span>
            </a>
            <a class="btn nav-link text-left d-flex instagram bg-light" href="{{ route('login') }}">
                <i class="fab fa-instagram social-share-icon pr-2"
                   style="color: red; font-size:30px; border-right: 1px solid grey; width: 36px"></i>
                <span class="social-share-text align-self-center pl-4">Đăng nhập bằng Instagram</span>
            </a>
            <a class="btn nav-link text-left d-flex twitter bg-light" href="{{ route('login') }}">
                <i class="fab fa-twitter social-share-icon pr-2"
                   style="color: #00b3ee; font-size:30px; border-right: 1px solid grey; width: 36px"></i>
                <span class="social-share-text align-self-center pl-4">Đăng nhập bằng Twitter</span>
            </a>
        @else

            <a class="btn btn-primary nav-link text-center"
               href="{{route('profile', Session::get('User')->id)}}">{{ Session::get('User')->name }}</a>
            <a class="btn btn-primary nav-link text-center" href="{{ route('logout') }}">Đăng xuất</a>
        @endif
    </div>
</div>
