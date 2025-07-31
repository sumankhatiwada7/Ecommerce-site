<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sellerproductcontroller extends Controller
{
   public function create()
   {
       return view('seller.product.create');
   }
   public function manage()
   {
       return view('seller.product.manage');
   }
}
