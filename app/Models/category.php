<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class category extends Model
{
    protected $fillable = [
        'category_name',
    ];
    public function subcategories(){
        return $this->hasMany(subcatrgory::class);
    }
}
