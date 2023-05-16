<form>

    <div class="form-group">

        <label for="exampleFormControlInput1">Category name:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category name" wire:model="cat_name" maxlength="25">

        @error('cat_name') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>

</form>