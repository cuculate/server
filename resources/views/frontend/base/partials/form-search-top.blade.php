<div class="wrap-search center-section">
    <div class="wrap-search-form">
        <form action="{{ route('search') }}" id="form-search-top" name="form-search-top">
            <input type="text" name="search" id="keyword-form-search-top" value="" placeholder="Search here...">
            <button form="form-search-top" id="submit-form-search-top" type="submit"><i class="fa fa-search"
                                                                                        aria-hidden="true"></i></button>
            <div class="wrap-list-cate">
                <input type="hidden" name="product-cate" id="category-form-search-top" value="0" id="product-cate">
                <a href="#" class="link-control">All Category</a>
                <ul class="list-cate">
                    <li class="level-0" value="0">All Category</li>
                    @foreach ($categories as $category)
                        <li class="level-1" value="{{ $category->id }}">-{{ $category->name}}</li>
                        @if(count($category->childrenCategories))
                            @foreach ($category->childrenCategories as $childCategory)
                                <li class="level-2" value="{{ $childCategory->id }}">{{$childCategory->name}}</li>
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
</div>
