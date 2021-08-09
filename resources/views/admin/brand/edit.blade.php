@extends('admin.dashboard')
@section('brand') active @endsection
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit the Category</title>
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
            <br>
            <div class="mb-3 ">
                Update the Brand <br><br>

                <form action="/admin/brand/{{ $brand->id }}" method="POST" enctype="multipart/form-data"> {{-- enctype is used to for file --}}
                    @csrf
                    @method('PUT')
                    <input class="form-control" type="text" name="name" placeholder="Enter Brand Name" value="{{ $brand->brand_name }}"><br>

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
