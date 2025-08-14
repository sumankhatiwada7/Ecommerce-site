<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcatrgory;

class mainsubcategories extends Controller
{
    public function store(Request $request){
        $validated_data=$request->validate([
            'subcategory' => 'required|string|unique:subcategories|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create the subcategory
    
        subcatrgory::create($validated_data);

        return redirect()->route('admin.subcategory.create')->with('success', 'Subcategory created successfully.');
    }
   
 
}
