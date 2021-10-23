@extends('admin.dashboard')
@section('users') active @endsection
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

                <div class="card-header">
                    <b>All Orders</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Delete A User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers  as $customer)

                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $customer->name }} </td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <form action="/admin/users/{{ $customer->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link" style="margin-top:-7px;">Delete</button>
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

        <script src="{{ asset('dashboard') }}/js/main.js"></script>


    @endsection

</body>

</html>
