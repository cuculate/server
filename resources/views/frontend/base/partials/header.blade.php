<div class="container">
    <div class="mid-section main-info-area">

        <div class="wrap-logo-top left-section">
            <a href="{{ route('home') }}" class="link-to-home"><img
                    src="{{ asset('images/site/logo.png') }}" alt="mercado"></a>
        </div>

        {!! Cache_SearchTop() !!}

        <div class="wrap-icon right-section cart-detail">
            <div class="wrap-icon-section minicart">
                <a href="{{ route('cart') }}" class="link-direction">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <div class="left-info">
                        @if( Session::has("Cart") != null)
                            <span class="index"
                                  id="quanty-cart-show"
                                  style="text-align: center">
                                {{ Session::get('Cart')->totalQuanty }}
                            </span>
                        @else
                            <span class="index" id="quanty-cart-show" style="text-align: center">0</span>
                        @endif
                        <span class="title">Giỏ hàng</span>
                    </div>
                </a>
            </div>
            @include('frontend.base.partials.cart')
            <div class="wrap-icon-section show-up-after-1024">
                <a href="#" class="mobile-navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>

    </div>
</div>
