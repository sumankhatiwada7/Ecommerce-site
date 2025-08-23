<?php

namespace App\Livewire;
use App\Models\product;
use Livewire\Component;

class Homepagecomponent extends Component
{
    public function render()
    {
        $products = product::all();
        return view('livewire.homepagecomponent', compact('products'));
    }
}
