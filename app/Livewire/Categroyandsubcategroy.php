<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\subcatrgory;

class Categroyandsubcategroy extends Component
{
    public $category=[];
    public $subCatrgory=[];
    public $selectedCategory;

    public function mount(){
        $this->category=category::all();
    }
    public function updateCategory($categoryid)
    {
        $this->subCatrgory=subcatrgory::where('category_id', $categoryid)->get();
    }

    public function render()
    {
        return view('livewire.categroyandsubcategroy');
    }
}
