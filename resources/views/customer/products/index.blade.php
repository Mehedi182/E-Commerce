@extends('layouts.app')
@section('content')

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <div class="container-xxl">
            <div class="row">
                @foreach ($products as $product)

                    <div class="col mt-5">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt=" " height="200px">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p><b>Price: </b>{{ $product->price }}<b>Tk</b></p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                <a href="#" class="btn btn-success ml-5">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </body>

    </html>
@endsection
