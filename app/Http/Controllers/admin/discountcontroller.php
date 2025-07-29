<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class discountcontroller extends Controller
{
    public function create()
    {
        return view('admin.discount.create');
    }

    public function manage()
    {
        return view('admin.discount.manage');
    }
}
