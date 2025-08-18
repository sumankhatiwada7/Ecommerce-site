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
    
    public function edit ($id)
    {
        $subcategory_info = subcatrgory::findOrFail($id);
        return view('admin.sub_category.edit', compact('subcategory_info'));
    }
     
    public function update(Request $request,$id){
        $subcategory_info=subcatrgory::findOrfail($id);
        $validatedData = $request->validate([
            'subcategory' => 'required|string|max:255|unique:subcategories,subcategory',
        ]);
        $subcategory_info->update($validatedData);
        return redirect()->back()->with('message', 'Subcategory updated successfully!');

    }
    public function delete($id){
        $subcategory_info=subcatrgory::findOrfail($id);
        $subcategory_info->delete();
        return redirect()->back()->with('message', 'Subcategory deleted successfully!');
    }

}
