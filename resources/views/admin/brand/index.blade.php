@extends('admin.dashboard')
@section('brand') active @endsection
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Category</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
          
            body {
                background-color: #f2f7ff;
            }

        </style>
    </head>

    <body>

        <div class="container col-12">
           
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
            <table class="table table-success  table-striped">
                <thead>
                    <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td style="color: black">{{ $brand->brand_name }}</td>
                            

                            <td> <a href="/admin/brand/{{ $brand->id }}/edit">
                                    <button type="submit" class="btn btn-link" style="margin-top:-7px;">Edit</button>
                                </a>

                                </a></td>

                            <td>
                                <form action="/admin/brand/{{ $brand->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link" style="margin-top: -7px;">Delete</button>
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
