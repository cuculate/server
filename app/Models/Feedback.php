<?php

namespace App\Models;

use App\Models\Columns\FeedbackColumn;

class Feedback extends BaseModel
{
    use FeedbackColumn;

    protected $table = 'feedback';

    public static $name = 'feedback';

    protected $primaryKey = "id";

    public static $key = "id";

    protected $fillable = [
        'id',
        'product_id',
        'name',
        'title',
        'created_at',
        'content',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id',Product::$key);
    }

}
