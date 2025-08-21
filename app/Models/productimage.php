<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productimage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'is_primary',
    ];
    public function product(){
        return $this->belongsTo(product::class);
    }
}
