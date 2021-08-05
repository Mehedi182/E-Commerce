@extends('admin.dashboard')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Category</title>
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
            <a href="/admin/category/create">
                <button class="btn btn-success btn-lg">Add A Category</button>
            </a><br> <br>
            <div class="row font-weight-bold">
                <div class="col ">Category Name</div>
                <div class="col ">Category Icon</div>
                <div class="col"></div>
                <div class="col"></div>
            </div> <br>
            @foreach ($category as $category)
                <div class="row bg-white">
                    <div class="col mt-3">
                        <p>{{ $category->name }}</p>
                    </div>
                    <div class="col mt-1">
                        <img src="{{ asset('images/category/' . $category->icon) }}" height="40px" width="40px" alt="">
                    </div>
                    <div class="col mt-3">
                        <a href="/admin/category/{{ $category->id }}/edit" >
                            <button type="submit" class="btn btn-link" style="margin-top:-7px;">Edit</button>
                        </a>
                    </div>
                    <div class="col mt-3">
                        <form action="/admin/category/{{ $category->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link" style="margin-top: -7px;">Delete</button>
                        </form>
                    </div>
                </div> <br>
            @endforeach
        </div>
    </body>

    </html>
@endsection
