<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stores;

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
           'visibility' => 'required|string',
           'meta_title' => 'nullable|string|max:255',
           'meta_description' => 'nullable|string|max:500',
           'status' => 'required|boolean',
           'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       

       return redirect()->route('seller.product.manage')->with('success', 'Product created successfully.');
   }
}
