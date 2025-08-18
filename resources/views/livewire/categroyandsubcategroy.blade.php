<div>  
     <label for="category">Category</label>
     <select id="category" class="form-select" wire:model="selectedCategory" wire:change="updateCategory($event.target.value)">
         <option value="">Select Category</option>
         @foreach($category as $cat)
             <option value="{{ $cat->id }}" class="text-bg">{{ $cat->category_name }}</option>
         @endforeach
     </select>
     <label for="sub-category">Sub Category</label>
     <select id="sub-category" class="form-select" >
         <option value="">Select Sub Category</option>
         @foreach($subCatrgory as $subCat)
             <option value="{{ $subCat->id }}">{{ $subCat->subcategory}}</option>
         @endforeach
     </select>
</div>
