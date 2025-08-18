<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stores;

class sellerstorecontroller extends Controller
{
    public function create()
    {
        return view('seller.store.create');
    }

    public function manage()
    {
        $stores = stores::all();
        return view('seller.store.manage', compact('stores'));
    }
    public function publish(Request $request)
    {
        $validated_data = $request->validate([
            'store_name' => 'required|string|unique:stores|max:255',
            'store_description' => 'required|string',
            'slug' => 'required|string|unique:stores,slug',
        ]);

        
        stores::create([
            'store_name' => $validated_data['store_name'],
            'store_description' => $validated_data['store_description'],
            'slug' => $validated_data['slug'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('message', 'Store created successfully.');
    }
}
