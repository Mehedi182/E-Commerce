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
            </a> <br> <br>
            @if (session('success'))
            <div class="alert alert-danger" role="alert">
              {{ session('success') }}
            </div>
            
            @elseif (session('update'))
            <div class="alert alert-danger" role="alert">
              {{ session('update') }}
            </div>
            @elseif (session('delete'))
            <div class="alert alert-danger" role="alert">
              {{ session('delete') }}
            </div>
            @endif
              
      
            <table class="table table-success  table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                 
        
                  <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td style="color: black">{{ $product->name }} </td>
                    <td style="color: black">{{ $product->description }}</td>
                    <td style="color: black"><img src="{{ asset('images/products/' . $product->image) }}" height="110px" width="110px" alt="">
                    </td>
                    <td style="color: black">{{ $product->price }}</td>
                    <td style="color: black">{{ $product->amount }}</td>
                    <td style="color: black">{{ $product->category_name }}</td>
                    <td> <a href="/admin/products/{{ $product->id }}/edit">
                        <button  class="btn btn-link" style="margin-top:-7px; margin-left:-12px;">Edit</button>

                    </a></td>

                    <td>
                        <form action="/admin/products/{{ $product->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link" style="margin-top:-7px; margin-left:-12px;">Delete</button>
                        </form>
                </td>
                  </tr>
                  
                  @endforeach
        
                </tbody>
              </table>
            </div>
        

    </body>

    </html>
@endsection
