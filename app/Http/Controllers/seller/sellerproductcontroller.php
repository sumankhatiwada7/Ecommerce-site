<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stores;
use App\Models\product;
use App\Models\productimage;

class sellerproductcontroller extends Controller
{
   public function create()
   {
       $authrised=auth()->user()->id;
       $stores=stores::where('user_id',$authrised)->get();

       return view('seller.product.create',compact('stores'));
   }
   public function manage()
   {
       return view('seller.product.manage');
   }
   public function store(Request $request)
   {
       $request->validate([
           'product_name' => 'required|string|max:255',
           'description' => 'required|string',
           'sku' => 'required|string|max:100',
           'regular_price' => 'required|numeric',
           'discount_price' => 'nullable|numeric',
           'tax_price' => 'nullable|numeric',
           'stock_quantity' => 'required|integer',
           'stock_status' => 'required|string',
           'slug' => 'required|string|max:255|unique:products,slug',
          
           'meta_title' => 'nullable|string|max:255',
           'meta_description' => 'nullable|string|max:500',
           'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
    
       $product=product::create([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'sku' => $request->sku,
        'seller_id' => auth()->user()->id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'store_id' => $request->store_id,
        'regular_price' => $request->regular_price,
        'discount_price' => $request->discount_price,
        'tax_price' => $request->tax_price,
        'stock_quantity' => $request->stock_quantity,
        'stock_status' => $request->stock_status,
        'slug' => $request->slug,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        
    ]);
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            productimage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'is_primary'=>false,
            ]);
        }
    }

       return redirect()->back()->with('success', 'Product created successfully.');
   }
}
