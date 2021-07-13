@extends('layouts.app')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
    </head>

    <body>
        <div class="container-fluid ml-5">
            <h3><a href="/admin/products/create" class="alert alert-secondary p-1 m-2">Add A product</a></h3><br>
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
                        <a href="/admin/products/{{ $product->id }}/edit">Edit</a>
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
