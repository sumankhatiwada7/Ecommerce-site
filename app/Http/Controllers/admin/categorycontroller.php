<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categorycontroller extends Controller
{  
       public function category_create()
       {
           return view('admin.category.create');
       }
       public function category_manage()
       {
           $categories = category::all();
           return view('admin.category.manage', compact('categories'));
       }


}
