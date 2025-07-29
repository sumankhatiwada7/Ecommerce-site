<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class subcategorycontroller extends Controller
{
    public function create()
    {
        return view('admin.subcategory.create');
    }

    public function manage()
    {
        return view('admin.subcategory.manage');
    }
}
