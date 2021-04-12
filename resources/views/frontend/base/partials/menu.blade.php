<div class="nav-section header-sticky">
    <div class="header-nav-section">
        <div class="container">
            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                <li class="menu-item"><a href="{{ route('sale') }}" class="link-term">Giảm giá</a><span
                        class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="{{ route('new') }}" class="link-term">Mới</a><span
                        class="nav-label hot-label">hot</span></li>
                <li class="menu-item"><a href="{{ route('hot') }}" class="link-term">Bán chạy</a><span
                        class="nav-label hot-label">hot</span></li>
            </ul>
        </div>
    </div>

    <div class="primary-nav-section">
        <div class="container">
            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                <li class="menu-item home-icon">
                    <a href="{{ route('home') }}" class="link-term mercado-item-title"><i class="fa fa-home"
                                                                                          aria-hidden="true"></i></a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('post','be-yeu') }}" class="link-term mercado-item-title">Bé Yêu</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('search') }}" class="link-term mercado-item-title">Shop</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('cart') }}" class="link-term mercado-item-title">Giỏ hàng</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('purchase') }}" class="link-term mercado-item-title">Mua hàng</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('contact') }}" class="link-term mercado-item-title">Liên Hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
