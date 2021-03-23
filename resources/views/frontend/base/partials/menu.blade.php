<nav class="navbar navbar-expand-md navbar-light p-0">
    <a class="navbar-brand sidebar-text pl-4"  style="font-size: 14px !important;" href="{{ route('home') }}">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="category sidebar-item">
                    <span class="sidebar-text">Danh mục</span>
                    <div class="dropdown-menu category-dropdown m-0">
                        <ul class="row d-flex p-4 pt-0">
                            @foreach ($categories as $category)
                                <li class="dropdown col-md-3">
                                    <a class="font-weight-bold" href="{{route('search')}}?category={{ $category->id }}">
                                        {{ $category->name}}
                                    </a>
                                    <br>
                                    @if(count($category->childrenCategories))
                                        @foreach ($category->childrenCategories as $childCategory)
                                            <a href="{{route('search')}}?category={{$childCategory->id}}">{{$childCategory->name}}</a>
                                            <br>
                                        @endforeach
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="category sidebar-item">
                    <a class="sidebar-text" href="{{route('hot')}}">Đồ chơi bán chạy</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="category sidebar-item">
                    <a class="sidebar-text" href="{{route('sale')}}">Khuyến mại</a>
                </div>
            </li>
            <li class="nav-item">
                <div class="brand sidebar-item">
                    <span class="sidebar-text">Thương hiệu</span>
                    <div class="dropdown-menu brand-dropdown m-0">
                        <ul class="row d-flex p-4">
                            @foreach($brands as $brand)
                                <li class="dropdown col-md-3">
                                    <a class="font-weight-bold" href="{{route('search')}}?brand={{ $brand->id }}">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="age sidebar-item">
                    <span class="sidebar-text">Nhóm tuổi</span>
                    <div class="dropdown-menu age-dropdown m-0">
                        <ul class="row d-flex p-4">
                            @foreach($ages as $age)
                                <li class="dropdown col-md-3">
                                    <a class="font-weight-bold" href="{{route('search')}}?age={{ $age->id }}">
                                        {{ $age->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
