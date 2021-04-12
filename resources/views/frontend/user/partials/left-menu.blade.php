<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 sitebar">
    <div class="widget mercado-widget categories-widget">
        <h2 class="widget-title">Thông tin tài khoản</h2>
        <div class="widget-content">
            <ul class="list-category">
                <li class="category-item">
                    <a class="cate-link" href="{{ route('edit-profile', Session::get('User')->id) }}">Cập
                        nhật thông tin</a>
                </li>
                <li class="category-item">
                    <a class="cate-link" href="{{ route('change-password', Session::get('User')->id) }}">Thay
                        đổi mật khẩu</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="widget mercado-widget categories-widget">
        <h2 class="widget-title"><a class="cate-link" href="{{ route('list-order', Session::get('User')->id) }}">
                Đơn hàng
            </a></h2>
    </div>

</div>
