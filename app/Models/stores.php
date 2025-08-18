<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stores extends Model
{
  
  protected $fillable = [
      'store_name',
      'store_description',
      'slug',
      'user_id',
  ];
}
