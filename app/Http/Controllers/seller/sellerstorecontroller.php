<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sellerstorecontroller extends Controller
{
    public function create()
    {
        return view('seller.store.create');
    }

    public function manage()
    {
        return view('seller.store.manage');
    }
}
