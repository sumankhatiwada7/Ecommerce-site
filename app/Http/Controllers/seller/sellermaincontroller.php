<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sellermaincontroller extends Controller
{
   public function index()
   {
       return view('seller.dashboard');
   }
   public function  orderhistory()
   {
       return view('seller.orderhistory');
   }
    
}
