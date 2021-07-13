@extends('layouts.app')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add a Category</title>
    </head>

    <body>
        <div class="container col-5 border p-5">
            <br>
            <div class="mb-3 ">
                Add a Category <br><br>

                <form action="/admin/category" method="POST" enctype="multipart/form-data"> {{-- enctype is used to for file --}}
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Enter Category Name"><br>
                    <label for="file">Icon: </label>
                    <input class="form-control col-6" type="file" name="image"> <br>

                    <button class="btn btn-success py-2 col-2" type="submit">Add</button>
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
