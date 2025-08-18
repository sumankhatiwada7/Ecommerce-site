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
    public function edit($id)
    {
        $store = stores::findOrFail($id);
        return view('seller.store.edit', compact('store'));

    }
    public function update(Request $request, $id)
    {
        $store = stores::findOrFail($id);

        $validated_data = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_description' => 'required|string',
            'slug' => 'nullable|string|unique:stores,slug,' . $store->id,
        ]);

        $store->update($validated_data);

        return redirect()->route('seller.store.manage')->with('message', 'Store updated successfully.');
    }
    public function delete($id)
    {
        $store = stores::findOrFail($id);
        $store->delete();

        return redirect()->route('seller.store.manage')->with('message', 'Store deleted successfully.');
    }
}
