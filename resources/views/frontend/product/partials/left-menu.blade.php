<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
    <div class="widget mercado-widget categories-widget">
        <h2 class="widget-title">Danh mục</h2>
{{--        @dd($product)--}}
        <div class="widget-content">
            <ul class="list-category">
                @foreach($categories as $category)
                    <li class="category-item {{ count($category->childrenCategories) > 0 ? 'has-child-cate' : ''  }}">
                        <a href="{{route('search',['product-cate'=> $category->id])}}"
                           class="cate-link">{{ $category->name }}</a>
                        @if(count($category->childrenCategories))
                            <span class="toggle-control">+</span>
                            @foreach ($category->childrenCategories as $childCategory)
                                <ul class="sub-cate">
                                    <li class="category-item"><a
                                            href="{{route('search',['product-cate'=> $childCategory->id])}}"
                                            class="cate-link">{{$childCategory->name}}</a>
                                    </li>
                                </ul>
                            @endforeach
                        @endif

                    </li>
                @endforeach
            </ul>
        </div>
    </div><!-- Categories widget-->

    <div class="widget mercado-widget filter-widget brand-widget">
        <h2 class="widget-title">Hãng</h2>
        <div class="widget-content">
            <ul class="list-style vertical-list list-limited" data-show="6">
                @foreach($brands as $key => $brand)
                    <li class="brand-item {{ $key > 5 ? 'default-hiden' : '' }}"><a class="filter-link "
                                                                                   href="{{route('search',['brands'=> $brand->id])}}">{{ $brand->name }}</a>
                    </li>
                @endforeach
                <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>'
                                         class="btn-control control-show-more" href="#">Show more<i
                            class="fa fa-angle-down" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div><!-- brand widget-->

    <div class="widget mercado-widget filter-widget">
        <h2 class="widget-title">Nhóm tuổi</h2>
        <div class="widget-content">
            <ul class="list-style vertical-list has-count-index">
                @foreach($ages as $age)
                    <li class="age-item"><a class="filter-link "
                                             href="{{ route('search',['ages' => $age->id]) }}">{{ $age->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div><!-- Age -->

    <div class="widget mercado-widget widget-product">
        <h2 class="widget-title">Đồ chơi khác</h2>
        <div class="widget-content">
            <ul class="products">
                @foreach($productRandoms as $product)
                    <li class="product-item">
                        <div class="product product-widget-style">
                            <div class="thumbnnail">
                                <a href="{{ route('show', $product->id) }}"
                                   title="{{ $product->name }}">
                                    <figure><img src="images/sanpham/{{$product->image}}"
                                                 alt="{{ $product->name }}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('show', $product->id) }}"
                                   class="product-name"><span>{{ $product->name }}</span></a>
                                <div class="wrap-price"><span class="product-price">{{ number_format($product->price) }} VNĐ</span></div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
