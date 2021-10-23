@extends('admin.dashboard')
@section('order') active @endsection

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
      
        body{
            background-color: #f2f7ff;
        }
        </style>
    </head>

    <body>
     
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
    </body>

    </html>
@endsection
