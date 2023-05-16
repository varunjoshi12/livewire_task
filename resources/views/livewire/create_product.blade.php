<form>

    <div class="form-group">

        <label for="exampleFormControlInput1">Product name:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product name" wire:model="pr_name" maxlength="50">
        @error('pr_name') <span class="text-danger">{{ $message }}</span>@enderror

       </br><label for="exampleFormControlInput1">Description:</label></br>

        <textarea id="description" class="form-control" name="description" rows="4" cols="50" wire:model="description" maxlength="250">
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
        <option value="">Select category</option>
        @foreach($categories as $categories)  
          <option value="{{ $categories->id }}">{{ $categories->cat_name }}</option>
          @endforeach 
        </select>
        </br>@error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
        

    </div>

    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>

</form>