@extends('layouts.app')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Category</title>
    </head>

    <body>
        <div class="container">
            <h3><a href="/admin/category/create" class="alert alert-secondary p-1 m-2">Add A Category</a></h3><br>

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
                        <a href="/admin/category/{{ $category->id }}/edit" >Edit</a>
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
