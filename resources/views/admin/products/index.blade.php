@extends('admin.dashboard')
@section('products') active @endsection
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/app.css">
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/images/favicon.svg" type="image/x-icon">
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
                            <!--tr>
                                    <td>Nathaniel</td>
                                    <td>mi.Duis@diam.edu</td>
                                    <td>(012165) 76278</td>
                                    <td>Grumo Appula</td>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                </tr-->

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <script src="{{ asset('dashboard') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('dashboard') }}/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('dashboard') }}/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>

        <script src="assets/js/main.js"></script>
        <!--Main 
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
                            <td style="color: black"><img src="{{ asset('images/products/' . $product->firstImage) }}" height="110px" width="110px" alt="">
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
                  -->

    @endsection

</body>

</html>
