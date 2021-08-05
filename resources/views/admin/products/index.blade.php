@extends('admin.dashboard')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
            .dropdown-menu{
          background-color: #2f3844;
        }
        body{
            background-color: #dfdfdf;
        }
        </style>
    </head>

    <body>
        <div class="container col-12" style="margin-left: 300px; margin-top:100px;">
            <a href="/admin/products/create">
                <button class="btn btn-success btn-lg">Add A product</button>
            </a><br> <br>
            <div class="row font-weight-bold">
                <div class="col">Product Name</div>
                <div class="col"> Description</div>
                <div class="col">Image</div>
                <div class="col">Price($)</div>
                <div class="col">Quantity</div>
                <div class="col">Category</div>
                <div class="col"></div>
                <div class="col"></div>

            </div> <br>
            @foreach ($products as $product)


                <div class="row mt-3 bg-white">
                    <div class="col mt-5">
                        {{ $product->name }}
                    </div>

                    <div class="col mt-5">
                        {{ $product->description }}
                    </div>
                    <div class="col">
                        <img src="{{ asset('images/products/' . $product->image) }}" height="110px" width="110px" alt="">
                    </div>
                    <div class="col mt-5">
                        {{ $product->price }}
                    </div>
                    <div class="col mt-5">
                        {{ $product->amount }}
                    </div>
                    <div class="col mt-5">
                        {{ $product->category_name }}
                    </div>
                    <div class="col mt-5">
                        <a href="/admin/products/{{ $product->id }}/edit">
                            <button  class="btn btn-link" style="margin-top:-7px;">Edit</button>

                        </a>
                    </div>
                    <div class="col mt-5">
                        <form action="/admin/products/{{ $product->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link" style="margin-top:-7px;">Delete</button>
                        </form>
                    </div>
                </div><br>

            @endforeach
        </div>
    </body>

    </html>
@endsection
