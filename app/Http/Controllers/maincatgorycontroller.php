<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class maincatgorycontroller extends Controller
{
    public function create()
    {
        $validatedData = request()->validate([
            'category-name' => 'required|string|max:255|unique:categories',
        ]);
        category::create($validatedData);
    }

    
}
