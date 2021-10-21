@extends('admin.dashboard')
@section('cupon') active @endsection
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit the Category</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
          
            body {
                background-color: #f2f7ff;
            }

        </style>
    </head>

    <body>

        <div class="container col-5 border border-dark p-5">
            <br>
            <div class="mb-3 ">
                Update the Cupon <br><br>

                <form action="/admin/cupons/{{ $cupon->id }}" method="POST" enctype="multipart/form-data">
                    {{-- enctype is used to for file --}}
                    @csrf
                    @method('PUT')
                    <input type="text" placeholder="Cupon Name" name="name" value="{{ $cupon->cupon_name }}" class="form-control py-2 my-2 col-8">
                    <input type="text" placeholder="Cupon Code" name="code" value="{{ $cupon->cupon_code }}" class="form-control py-2 my-2 col-8">
                    <input type="number" placeholder="Parcentage" name="percentage" class="form-control py-2 my-2 col-8">
                    <button class="btn btn-success py-2 col-2" type="submit">Update</button>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li style="color: red">
                                {{ $error }}
                            </li>

                        @endforeach

                    @endif
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection
