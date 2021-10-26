@extends('layouts.fontend')
@section('font_content')

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
        <style>
            body {
                background-color: white;
            }

        </style>

    </head>

    <body>
        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All Category</span>
                            </div>
                            @php
                                $category = App\Models\Category::orderBy('name')->get();
                            @endphp
                            <ul>
                                @foreach ($category as $cat)
                                    <li><a href="#">{{ $cat->name }}</a></li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">


                <div class="card col-4 border ml-2">
                    <div class="card-header">
                        <h4 class="card-title">Your Personal Profile</h4>
                    </div>
                    <div class="card-body">

                        <h6> {{ $user->name }}</h6>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>

            </div>

            <section class="section">
                <div class="card col border">
                    <div class="card-header">
                        Your All Orders
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Invoice no</th>
                                    <th>Payment Type</th>
                                    <th>Subtotal</th>
                                    <th>Discounts</th>
                                    <th>Total</th>
                                    <th>Order Date & Type</th>
                                    <th>Show Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>{{ $order->subtotal }}</td>
                                        <td>{{ $order->cupon_discount }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td> <a href="/user/orders/{{ $order->id }}/details">

                                                <button type="submit" class="btn btn-link"><i class="bi bi-eye-fill"></i>
                                                </button>
                                            </a></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
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
