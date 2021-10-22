@extends('admin.dashboard')
@section('products') active @endsection

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
     

        <div class="container col-12">
            
      
            <table class="table table-success  table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Invoice No</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Total</th>
                    <th scope="col">View</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                 
        
                  <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td style="color: black">{{ $order->invoice_no }} </td>
                    <td style="color: black">{{ $order->payment_type }}</td>
                    <td style="color: black">{{ $order->subtotal }}</td>
                    <td style="color: black">{{ $order->cupon_discount }}</td>
                    <td style="color: black">{{ $order->total }}</td>
                 

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
        

    </body>

    </html>
@endsection
