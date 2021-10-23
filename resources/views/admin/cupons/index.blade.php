@extends('admin.dashboard')
@section('cupon') active @endsection

@section('content')
    <html lang="en">

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
        @elseif (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
                <button>
                    <span>&times</span>
                </button>
            </div>
        @endif
            <div class="row">
                <div class="card col-8">

                    <div class="card-header">
                        <b>All Orders</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Cupon Name</th>
                                    <th>Cupon Code</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cupons as $cupon)


                                    <tr>
                                        <th>{{ $sl++ }}</th>
                                        <td>{{ $cupon->cupon_name }} </td>
                                        <td>{{ $cupon->cupon_code }}</td>
                                        @if ($cupon->status == 1)
                                            <td>
                                                <a class="btn-link link-success"
                                                    href="/admin/cupons/inactive/{{ $cupon->id }}"
                                                    onclick="return confirm('Are You Sure to InActive this Cupon?')">
                                                    Active
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a class="btn-link link-danger"
                                                    href="/admin/cupons/active/{{ $cupon->id }}"
                                                    onclick="return confirm('Are You Sure to Active this Cupon?')">
                                                    InActive
                                                </a>
                                            </td>
                                        @endif

                                        <td> <a href="/admin/cupons/{{ $cupon->id }}/edit">
                                                <button class="btn btn-link">Edit</button>

                                            </a></td>

                                        <td>
                                            <form action="/admin/cupons/{{ $cupon->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add A Cupon</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="/admin/cupons" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Cupon Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Cupon Name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Cupon Code</label>
                                                    <input type="text" class="form-control" name="code"
                                                        placeholder="Cupon Code">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Parcentage</label>
                                                    <input type="number" class="form-control" name="parcentage"
                                                        placeholder="Parcentage">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <li style="color: red">
                                                            {{ $error }}
                                                        </li>

                                                    @endforeach

                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
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

        <script src="{{ asset('dashboard') }}/js/main.js"></script>



    </body>

    </html>
@endsection
