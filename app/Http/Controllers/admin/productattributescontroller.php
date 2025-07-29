<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productattributescontroller extends Controller
{
    public function create()
    {
        return view('admin.product_attributes.create');
    }

    public function manage()
    {
        return view('admin.product_attributes.manage');
    }
}
