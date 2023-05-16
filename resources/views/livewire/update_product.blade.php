<form>

<input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category name" wire:model="pr_id">

    <div class="form-group">

        <label for="exampleFormControlInput1">Product name:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product name" wire:model="pr_name" maxlength="50">
        @error('pr_name') <span class="text-danger">{{ $message }}</span>@enderror

        </br><label for="exampleFormControlInput1">Description:</label></br>

        <textarea id="w3review" name="w3review" rows="4" cols="50" wire:model="description" maxlength="250" class="form-control">
         </textarea>
         </br>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </br>
         <label for="exampleFormControlInput1">Price:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product price" wire:model="price" maxlength="25">
        </br>
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror     
        </br>   
        <label for="exampleFormControlInput1">Category:</label>
        </br>
        <select wire:model="category_id" id="cars" class="form-control">
        @foreach($categories as $categories)  
          <option value="{{ $categories->id }}" {{$category_id == $categories->id  ? 'selected' : ''}}>{{ $categories->cat_name}}</option>
          @endforeach 
        
        </select>

        @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>

</form>