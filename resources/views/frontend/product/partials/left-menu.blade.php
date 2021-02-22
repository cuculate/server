<div class="left-sidebar">
    <div class="left-menu-title">Mua Sắm</div>
    <div class="left-menu-body">
        <div class="left-menu-body">
            <div class="title-menu">
                <a>Danh mục</a>
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="dropdown">
                        <a class="nav-link" href="{{route('search')}}?category={{ $category->id }}">
                            {{ $category->name}}
                        </a>
                        @if(count($category->childrenCategories))
                            <div class="dropdown-menu p-0">
                                @foreach ($category->childrenCategories as $childCategory)
                                    <a  class="nav-link"
                                       href="{{route('search')}}?category={{$childCategory->id}}">{{$childCategory->name}}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="title-menu">
                <a>Thương hiệu</a>
            </div>
            <ul style="overflow-y: scroll; height: 250px">
                @foreach($brands as $brand)
                    <li class="dropdown" value="{{$brand->id}}">
                        <a class="nav-link" href="{{route('search')}}?brand={{ $brand->id }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="title-menu"
                 style="height:30px;padding-top:0px;height:30px;border-bottom:1px solid silver">
                <a>Nhóm tuổi</a>
            </div>
            <ul>
                @foreach($ages as $age)
                    <li class="dropdown" value="{{$age->id}}">
                        <a  class="nav-link" href="{{route('search')}}?age={{ $age->name }}">
                            {{ $age->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="adv">
        <img src="images/adv/CubicFun.png" alt="Quảng cáo">
    </div>
</div>
