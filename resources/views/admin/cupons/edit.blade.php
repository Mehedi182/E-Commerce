@extends('admin.dashboard')
@section('cupons') active @endsection

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
            .dropdown-menu {
                background-color: #2f3844;
            }

            body {
                background-color: #dfdfdf;
            }

        </style>
    </head>

    <body>


        <div class="container row" style="margin-left: 300px; margin-top:100px;">
        
           
            <div class="col">


                <table class="table table-success table-s  table-striped table-hover"  style="text-align: center">
                    <thead>
                        <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Cupon Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Parcentange</th> --}}

                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>


                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td style="color: black">{{ $cupon->cupon_name }} </td>
                                <td style="color: black">{{ $cupon->cupon_code }}</td>
                                <td style="color: black">{{ $cupon->status }}</td>

                                <td> <a href="/admin/cupons/{{ $cupon->id }}/edit">
                                        <button class="btn btn-link"
                                            style="margin-top:-7px; ">Edit</button>

                                    </a></td>

                                <td>
                                    <form action="/admin/cupons/{{ $cupon->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link"
                                            style="margin-top:-7px;">Delete</button>
                                    </form>
                                </td>
                            </tr>


                    </tbody>
                </table>
            </div>
            <div class="col-4 border border-dark">
                <center>
                    Add a Cupon

                    <form action="/admin/cupons/{{ $cupon->id }}" method="POST" enctype="multipart/form-data"> {{-- enctype is used to for file --}}
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="Cupon Name" name="name" value="{{ $cupon->cupon_name }}" class="form-control py-2 my-2 col-8">
                        <input type="text" placeholder="Cupon Code" name="code" value="{{ $cupon->cupon_code }}" class="form-control py-2 my-2 col-8">
                        <input type="number" placeholder="Parcentage" name="percentage" class="form-control py-2 my-2 col-8">
                        <button class="btn btn-success py-2 col-2 mb-4 mt-2" type="submit">Add</button>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li style="color: red">
                                    {{ $error }}
                                </li>

                            @endforeach

                        @endif

                    </form>
                </center>
            </div>
        </div>


    </body>

    </html>
@endsection
