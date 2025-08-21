<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\category;
use App\Models\subcategory;
use App\Models\stores;
class product extends Model

{
   protected $fillable = [
        'product_name',
        'description',
        'sku',
        'seller_id',
        'category_id',
        'subcategory_id',
        'store_id',
        'regular_price',
        'discount_price',
        'tax_price',
        'stock_quantity',
        'stock_status',
        'slug',
        'visibility',
        'meta_title',
        'meta_description',
        'status'
    ];
    
    public function seller(){
        return $this->belongsTo(User::class, );
    }
    public function category(){
        return $this->belongsTo(category::class,);
    }
    public function subcategory(){
        return $this->belongsTo(subcategory::class,);
    }
    public function store(){
        return $this->belongsTo(stores::class);
    }
    public function productimage(){
        return $this->hasMany(productimage::class);
    }

}
