<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
     public function manage_product_review()
     {
         return view('admin.product.manage_product_review');
     }

     public function product_manage()
     {
         return view('admin.product.manage_product');
     }
}
