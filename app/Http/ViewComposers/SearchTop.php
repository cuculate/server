<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Repos\CategoryRepo;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Support\Http\Controllers\BaseController;

class SearchTop extends BaseController
{
    private $category;

    public function __construct(CategoryRepo $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function compose(View $view)
    {
        if (Cache::has('searchtop')){
            return;
        }
        $categories = $this->category->getSelectParent();
        $view->with(compact('categories'));
    }
}
