<div class="topbar-menu right-menu">
    <ul>
        @if(Session::has('User') == null)
            <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}">Đăng
                    nhập</a>
            </li>
            <li class="menu-item"><a title="Register or Login" href="{{ route('register') }}">Đăng
                    ký</a>
            </li>
        @else
            <li class="menu-item menu-item-has-children parent" >
                <a title="My Account" href="{{route('profile', Session::get('User')->id)}}">{{ Session::get('User')->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="submenu curency" >
                    <li class="menu-item"><a href="{{ route('list-order', Session::get('User')->id) }}">ĐƠn hàng</a></li>
                    <li class="menu-item"><a href="{{ route('profile', Session::get('User')->id) }}">Tài khoản</a></li>
                    <li class="menu-item" ><a title="Logout" href="{{ route('logout') }}">Đăng xuất</a></li>
                </ul>
            </li>
        @endif
    </ul>
</div>
