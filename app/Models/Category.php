<?php

namespace App\Models;

use App\Models\Columns\CategoryColumn;

class Category extends BaseModel
{
    use CategoryColumn;

    protected $table = 'category';

    public static $name = 'category';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'status',
    ];

    public function categories()
    {
        return $this->hasOne(Category::class,$this->primaryKey,'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class,'parent_id',$this->primaryKey)->with('categories');
    }


}
