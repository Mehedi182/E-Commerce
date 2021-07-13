@extends('layouts.app')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit the Category</title>
    </head>

    <body>
        <div class="container col-5 border p-5">
            <br>
            <div class="mb-3 ">
                Update the Category <br><br>

                <form action="/admin/category/{{ $category->id }}" method="POST" enctype="multipart/form-data"> {{-- enctype is used to for file --}}
                    @csrf
                    @method('PUT')
                    <input class="form-control" type="text" name="name" placeholder="Enter Category Name" value="{{ $category->name }}"><br>
                    <label for="file">Icon: </label>
                    <input class="form-control col-6" type="file" name="image" value="{{ asset('images/category/' .$category->icon) }}"> <br>

                    <button class="btn btn-success py-2 col-2" type="submit">Update</button>
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
