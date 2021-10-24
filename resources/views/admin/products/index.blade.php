@extends('admin.dashboard')
@section('products') active @endsection
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>


</head>

<body>
    @section('content')

        <section class="section">
            <div class="card">
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
                <div class="card-header">
                    <b>All Products</b>

                    <form action="" class="input-group mt-3">
                        <input type="search" class="form-control" placeholder="Search by Product Name" name="search" value="{{ $search }}">
                        <button class="input-group-text bg-info">Search</button>
                        <p style="margin-left:1000px"></p>
                    </form>


                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)

                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->amount }}</td>
                                    <!--td><img src="{{ asset('images/products/' . $product->firstImage) }}" height="110px" width="110px" alt=""></td-->
                                    <td>{{ $product->category_name }}</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td> <a href="/admin/products/{{ $product->id }}/edit">
                                            <button class="btn btn-link"
                                                style="margin-top:-7px; margin-left:-12px;">Edit</button>

                                        </a></td>
                                    <td>
                                        <form action="/admin/products/{{ $product->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link"
                                                style="margin-top:-7px; margin-left:-12px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endsection

</body>

</html>
