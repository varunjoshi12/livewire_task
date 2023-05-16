<div>

  

    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

    

    @if($updateMode)

        @include('livewire.update')

    @else

        @include('livewire.create')

    @endif

  

    <table class="table table-striped mt-10" id="categories1">

        <thead>

            <tr>

                <th>No.</th>
                <th>Category</th>
                <th width="150px">Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($categories as $cat)

            <tr>

                <td>{{ $cat->id }}</td>

                <td>{{ $cat->cat_name }}</td>

                <td>

                <button wire:click="edit({{ $cat->id }})" class="btn btn-primary btn-sm">Edit</button>

                    <button wire:click="delete({{ $cat->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>

            </tr>

            @endforeach

          

        </tbody>

    </table>
    <div style="float:right">
    {{ $categories->links() }}
    </div>
</div>

