<div class="bg-light">
    <div class="d-flex justify-content-around row header">
        <div class="logo">
            <a class="align-self-center" href="{{route('home')}}"><img src="{{ asset('./images/site/NavSiteLogo.png') }}" alt="Combine Shop"></a>
        </div>
        <form class="form-inline" method="get" action="{{ route('search') }}">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Tìm sản phẩm ...">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-search"></i>
                Tìm kiếm
            </button>
        </form>
        <div class=" login">
            <ul class="nav">
                @include('frontend.base.partials.user')
                <li class="nav-item cart-detail">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <span>
                            <img src="{{ asset('./images/ico/icon-shopping-cart.png') }}" alt="Giỏ hàng">
                        </span>
                        <span>Giỏ hàng</span>
                        @if( Session::has("Cart") !=null)
                            <span
                                id="quanty-cart-show"
                                class="bg-warning p-1"
                                style="border-radius: 10px">{{ Session::get('Cart')->totalQuanty }}</span>
                        @else
                            <span
                                id="quanty-cart-show"
                                class="bg-warning p-1"
                                style="border-radius: 10px">0</span>
                        @endif
                    </a>
                    @include('frontend.base.partials.cart')
                </li>
            </ul>
        </div>
    </div>
</div>
