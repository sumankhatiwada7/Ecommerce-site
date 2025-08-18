<?php

namespace App\Http\Controllers;

use App\Models\Deafultattribute;
use Illuminate\Http\Request;

class productattribute extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'attribute_value' => 'required|string|max:255|unique:deafultattributes,attribute_value',
        ]);

        // Create the product attribute
        Deafultattribute::create([
            'attribute_value' => $request->attribute_value,
        ]);

        return redirect()->back()->with('success', 'Product attribute created successfully.');
    }
    public function edit($id){
        $attribute = Deafultattribute::findOrFail($id);
        return view('admin.product_attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id)
    {
        $attribute = Deafultattribute::findOrFail($id);

        $request->validate([
            'attribute_value' => 'required|string|max:255|unique:deafultattributes,attribute_value,' . $attribute->id,
        ]);

        $attribute->update([
            'attribute_value' => $request->attribute_value,
        ]);

        return redirect()->back()->with('message', 'Product attribute updated successfully.');
    }
    public function delete($id)
    {
        $attribute = Deafultattribute::findOrFail($id);
        $attribute->delete();

        return redirect()->back()->with('message', 'Product attribute deleted successfully.');
    }

}