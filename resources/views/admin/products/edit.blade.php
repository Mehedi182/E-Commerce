@extends('admin.dashboard')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a Product</title>
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

    <div class="container col-5 border border-dark p-5" style="margin-top: 100px">
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