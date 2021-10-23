@extends('admin.dashboard')
@section('order') active @endsection
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
                                <th>Invoice No</th>
                                <th>Payment Type</th>
                                <th>Subtotal</th>
                                <th>Discounts</th>
                                <th>Total</th>
                                <th>View Order</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)

                                <tr>
                                    <th>{{ $sl++ }}</th>
                                    <td>{{ $order->invoice_no }} </td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->cupon_discount }}</td>
                                    <td>{{ $order->total }}</td>


                                    <td>
                                        <a href="/admin/orders/{{ $order->id }}/details">

                                            <button type="submit" class="btn btn-link"><i class="bi bi-eye-fill"></i>
                                            </button>
                                        </a>
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
