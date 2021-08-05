@extends('admin.dashboard')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Product</title>
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
        <center> Add a Product </center>
    <form action="/admin/products" method="POST" enctype="multipart/form-data">    {{-- enctype is used to for file --}}
        @csrf
    <input class="form-control py-2 my-2" type="text" placeholder="Product Name" name="name"> 
    <input class="form-control py-2 my-2" type="text" placeholder="Description" name="description">
    <input class="form-control py-2 my-2" type="number" placeholder="Amount" name="amount">
    <input class="form-control py-2 my-2" type="number" placeholder="Price per pieces" name="price">
    <select class="form-control py-2 my-2"  name="category_name">
        <option value="" selected="" disabled="">Select a category</option>
        @foreach ($category as $category)
            <option >{{ $category->name }}</option>
        @endforeach
    </select>

    <input class="form-control py-2 my-2 col-5" type="file" name="image">
    <button class="btn btn-success py-2 col-2" type="submit">Add</button>
    </form>
    </div>
</body>
</html>
@endsection