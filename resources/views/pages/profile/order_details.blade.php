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
        <div id="app">

            <div id="main">

                <div class="page-heading">
                        
<!--order details -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Invoice No</label>
                                                <input type="text" class="form-control" value="{{ $order->invoice_no }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Payment Type</label>
                                                <input type="text" class="form-control" value="{{ $order->payment_type }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Subtotal</label>
                                                <input type="text" class="form-control" value="{{ $order->subtotal }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Discount</label>
                                                <input type="text" class="form-control" value="{{ $order->cupon_discount }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Total</label>
                                                <input type="text" class="form-control" value="{{ $order->total }}" disabled>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="text" class="form-control" value="{{ $email }}" disabled>
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
<!--End order details -->
<!-- products details-->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ordered Products</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            @foreach ($order_items as $order_item)
                                

                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Product Name</label>
                                        <input type="text" class="form-control" value="{{ $order_item->product_name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Product Quantity</label>
                                        <input type="text" class="form-control" value="{{ $order_item->product_quantity }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Price Per Pieces</label>
                                    
                                        <input type="text" class="form-control" value="{{ $order_item->product->price }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Total Price</label>
                                        <input type="text" class="form-control" value="{{ ($order_item->product->price) * ($order_item->product_quantity) }}" disabled>

                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Products details -->
<!-- shipping details-->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shipping Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">                                

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Customer Name</label>
                                        <input type="text" class="form-control" value="{{ $shipping->shipping_name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Address</label>
                                        <input type="text" class="form-control" value="{{ $shipping->address }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="city-column">City</label>
                                        <input type="text" class="form-control" value="{{ $shipping->city }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Postal Code</label>
                                        <input type="text" class="form-control" value="{{ $shipping->post_code }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Phone</label>
                                        <input type="text" class="form-control" value="{{ $shipping->shipping_phone }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Email</label>
                                        <input type="text" class="form-control" value="{{ $shipping->shipping_email }}" disabled>
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
<!--End shipping details -->
                    
                </div>


            </div>
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
