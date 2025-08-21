<div>  
     <label for="category_id">Category</label>
     <select id="category" class="form-select mb-2"name="category_id" wire:model="selectedCategory" wire:change="updateCategory($event.target.value)">
         <option value="">Select Category</option>
         @foreach($category as $cat)
             <option value="{{ $cat->id }}" class="text-bg">{{ $cat->category_name }}</option>
         @endforeach
     </select>
     <label for="subcategroy_id">Sub Category</label>
     <select id="sub-category" class="form-select" name="subcategory_id" wire:model="selectedSubCategory">
         <option value="">Select Sub Category</option>
         @foreach($subCatrgory as $subCat)
             <option value="{{ $subCat->id }}">{{ $subCat->subcategory}}</option>
         @endforeach
     </select>
</div>
