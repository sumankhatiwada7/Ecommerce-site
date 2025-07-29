<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{  
       public function category_create()
       {
           return view('admin.category.create');
       }
       public function category_manage()
       {
           return view('admin.category.manage');
       }


}
