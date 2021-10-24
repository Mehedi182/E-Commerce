@extends('admin.dashboard')
@section('order') active @endsection
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

                <div class="card-header">
                    <b>All Orders</b>
                    <form action="" class="input-group mt-3">
                        <input type="search" class="form-control" placeholder="Search by Invoice No or User email" name="search" value="{{ $search }}">
                        <button class="input-group-text bg-info">Search</button>
                        <p style="margin-left:1000px"></p>
                    </form>
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
                                <th>Order By</th>
                                <th>View Order</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)

                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $order->invoice_no }} </td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->cupon_discount }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->user->email }}</td>


                                    <td>
                                        <a href="/admin/orders/{{ $order->id }}/details">

                                            <button type="submit" class="btn btn-link"><i class="bi bi-eye-fill"></i>
                                            </button>
                                        </a>
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
