@extends('admin.dashboard')
@section('users') active @endsection
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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
            <table class="table table-success  table-striped">
                <thead>
                    <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Delete A user</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)

                        
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td style="color: black">{{ $customer->name }} </td>
                            <td style="color: black">{{ $customer->email }}</td>
                            <td>
                                <form action="/admin/users/{{ $customer->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link" style="margin-top:-7px;">Delete</button>
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
