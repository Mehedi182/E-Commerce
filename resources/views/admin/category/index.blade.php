@extends('admin.dashboard')
@section('category') active @endsection
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
                    <b>All Category</b>
                    <form action="" class="input-group mt-3">
                        <input type="search" class="form-control" placeholder="Search by Category Name" name="search" value="{{ $search }}">
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
                                <th>Icon</th>
                                <th>Edit</th>
                                <th>Delete</th>
                       
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($category as $category)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td >{{ $category->name }}</td>
                                    <td>
                                        <img src="{{ asset('images/category/' . $category->icon) }}" height="50px" width="50px"
                                            alt="">
                                    </td>
        
                                    <td> <a href="/admin/category/{{ $category->id }}/edit">
                                            <button type="submit" class="btn btn-link">Edit</button>
                                        </a>
        
                                        </a></td>
        
                                    <td>
                                        <form action="/admin/category/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link">Delete</button>
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

    

    @endsection

</body>

</html>
