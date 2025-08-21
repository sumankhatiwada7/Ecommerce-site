<div>  
     <label for="category_id">Category</label>
     <select id="category" class="form-select mb-2" name="category_id" wire:model="selectedCategory" >
         <option value="">Select Category for your product</option>
         @foreach($category as $cat)
             <option value="{{ $cat->id }}" class="text-bg">{{ $cat->category_name }}</option>
         @endforeach
     </select>
     <label for="sub-category">Sub Category</label>
     <select id="sub-category" class="form-select mb-2" name="subcategory_id" wire:model="selectedSubCategory">
         <option value="">Select Sub Category for your product</option>
         @foreach($subCatrgory as $subCat)
             <option value="{{ $subCat->id }}">{{ $subCat->subcategory}}</option>
         @endforeach
     </select>
</div>
