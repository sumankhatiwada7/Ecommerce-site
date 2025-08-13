<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcatrgory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = [
        'subcategory',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
