<!DOCTYPE html>

<html>

<head>

    <title>Categories Section</title>

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css')}}">

    <script src="{{ asset('js/jquery-1.9.1.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/category.js')}}"></script>

    @livewireStyles

</head>

<body>

    <div class="container  mt-2">
   
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
               

                    <div class="card-header">
                        <div class="row">
                        <div class="col-9">
                            <h2>Categories Section</h2>
                        </div>
                        <div class="col-3 mt-1">
                        <a href="{{ url('productlist') }}" class="btn btn-success">Add Products</a> 
                        </div>
                        </div>


                    </div>

                    <div class="card-body">

                        @if (session()->has('message'))

                            <div class="alert alert-success">

                                {{ session('message') }}

                            </div>

                        @endif

                        @livewire('categories')
                        
                    </div>

                </div>

            </div>

        </div>

    </div>

    @livewireScripts

</body>

</html>