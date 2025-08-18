<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deafultattribute;

class productattributescontroller extends Controller
{
    public function create()
    {
        return view('admin.product_attributes.create');
    }

    public function manage()

    {
        $attributes = Deafultattribute::all();
        return view('admin.product_attributes.manage', compact('attributes'));
    }
}
