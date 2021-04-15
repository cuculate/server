<div class="wrap-right">

    <div class="sort-item orderby ">
        <select name="orderby" class="use-chosen">
            <option value="menu_order" selected="selected">Default sorting</option>
            <option value="popularity" @if(isset($_GET['sort']) &&  $_GET['sort'] == 'popularity') selected=""
                @endif>Sort by popularity</option>
            <option value="rating" @if(isset($_GET['sort']) && $_GET['sort'] == 'rating') selected=""
                @endif>Sort by average rating</option>
            <option value="date" @if(isset($_GET['sort']) && $_GET['sort'] == 'date') selected=""
                @endif>Sort by newness</option>
            <option value="price" @if(isset($_GET['sort']) && $_GET['sort'] == 'price') selected=""
                @endif>Sort by price: low to high</option>
            <option value="price-desc" @if(isset($_GET['sort']) && $_GET['sort'] == 'price-desc') selected=""
                @endif>Sort by price: high to low</option>
        </select>
    </div>

    <div class="sort-item product-per-page">
        <select name="post-per-page" class="use-chosen">
            <option value="12" selected="selected" @if(isset($_GET['page']) &&  $_GET['page'] == 12) selected=""
                @endif>12 per page</option>
            <option value="16"@if(isset($_GET['page']) &&  $_GET['page'] == 16) selected=""
                @endif>16 per page</option>
            <option value="18"@if(isset($_GET['page']) &&  $_GET['page'] == 18) selected=""
                @endif>18 per page</option>
            <option value="21"@if(isset($_GET['page']) &&  $_GET['page'] == 21) selected=""
                @endif>21 per page</option>
            <option value="24"@if(isset($_GET['page']) &&  $_GET['page'] == 24) selected=""
                @endif>24 per page</option>
            <option value="30"@if(isset($_GET['page']) &&  $_GET['page'] == 30) selected=""
                @endif>30 per page</option>
            <option value="32"@if(isset($_GET['page']) &&  $_GET['page'] == 32) selected=""
                @endif>32 per page</option>
        </select>
    </div>

    <div class="change-display-mode">
        <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
        <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
    </div>

</div>
