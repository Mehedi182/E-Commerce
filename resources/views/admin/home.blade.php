@extends('admin.dashboard')

@section('content')
<br><br>

     <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> 
    <div class="container col-4">
        <a href="category/">
            <button class="btn btn-link">Category</button>
        </a>
        <a href="products/">
            <button class="btn btn-link">Products</button>
        </a>
        
    </div>
  
      
  
   
@endsection
