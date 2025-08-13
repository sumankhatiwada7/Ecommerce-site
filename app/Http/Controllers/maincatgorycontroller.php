<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class maincatgorycontroller extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ]);

        Category::create([
            'category_name' => $validatedData['category_name'],
        ]);

        return back()->with('success', 'Category created successfully!');
    }
    public function edit($id){
        $category_info=Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }
    public function update(Request $request,$id){
        $category_info=category::findOrfail($id);
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ]);
        $category_info->update($validatedData);
        return redirect()->back()->with('message', 'Category updated successfully!');

    }
    public function delete($id){
        $category_info=Category::findOrfail($id);
        $category_info->delete();
        return redirect()->back()->with('message', 'Category deleted successfully!');
    }
}

