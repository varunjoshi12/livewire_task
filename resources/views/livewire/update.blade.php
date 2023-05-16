<form>

<input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category name" wire:model="cat_id">

    <div class="form-group">

        <label for="exampleFormControlInput1">Title:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category name" wire:model="cat_name">

        @error('cat_name') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>

    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>

</form>