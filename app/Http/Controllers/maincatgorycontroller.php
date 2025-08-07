<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class maincatgorycontroller extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ]);

        Category::create([
            'category_name' => $validatedData['category_name'],
        ]);

        return back()->with('success', 'Category created successfully!');
    }
}

