<div>

  

    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

    

    @if($updateMode)

        @include('livewire.update_product')

    @else

        @include('livewire.create_product')

    @endif

  

    <table class="table table-striped mt-10">

        <thead>

            <tr>

                <th>No.</th>
                <th>Product name</th>
                <th>description</th>
                <th>price</th>
                <th width="150px">Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach($products as $pr)

            <tr>

                <td>{{ $pr->id }}</td>
                <td>{{ $pr->pr_name }}</td>
                <td>{{ $pr->description }}</td>
                <td>{{ $pr->price }}</td>
                <td>

                <button wire:click="edit({{ $pr->id }})" class="btn btn-primary btn-sm">Edit</button>

                    <button wire:click="delete({{ $pr->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>

            </tr>

            @endforeach
           
        </tbody>

    </table>
    <div style="float:right">
    {{ $products->links() }}
    </div>

</div>

