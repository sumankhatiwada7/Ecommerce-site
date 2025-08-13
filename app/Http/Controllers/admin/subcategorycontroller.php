<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;


class subcategorycontroller extends Controller
{
    public function create()

    {
        $Category=category::all();
        return view('admin.sub_category.create',compact('Category'));
    }

    public function manage()
    {
        return view('admin.sub_category.manage');
    }
}
