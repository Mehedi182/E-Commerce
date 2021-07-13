@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a Product</title>
</head>
<body>

    <div class="container col-5 border p-5">
        <center> Update the Product </center>
    <form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">    {{-- enctype is used to for file --}}
        @csrf
        @method('PUT')
    <input class="form-control py-2 my-2" type="text" placeholder="Product Name" name="name" value="{{ $product->name }}"> 
    <input class="form-control py-2 my-2" type="text" placeholder="Description" name="description" value="{{ $product->description }}">
    <input class="form-control py-2 my-2" type="number" placeholder="Amount" name="amount" value="{{ $product->amount }}">
    <input class="form-control py-2 my-2" type="number" placeholder="Price per pieces" name="price" value="{{ $product->price }}">
    <select class="form-control py-2 my-2"  name="category_name">
        <option>{{ $product->category_name }}</option>
        @foreach ($category as $category)
        @if($category->name!=$product->category_name)
            <option >{{ $category->name }}</option>
        @endif
        @endforeach
    </select>

    <input class="form-control py-2 my-2 col-5" type="file" name="image">
    <button class="btn btn-success py-2 col-2" type="submit">Update</button>
    </form>
    </div>
</body>
</html>
@endsection