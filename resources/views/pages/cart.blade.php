@extends('layouts.fontend')
@section('font_content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <!-- Hero Section Begin -->
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
                                $category = App\models\Category::orderBy('name')->get();
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
        <!-- Hero Section End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Shopping Cart</h2>
                            <div class="breadcrumb__option">
                                <a href="/products">Home</a>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                @if (session('CartDelete'))
                    <div class="alert alert-success alert-dismissble fade show" role="alert">
                        {{ session('CartDelete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                    </div>
                 @else   <div class="alert alert-success alert-dismissble fade show" role="alert">
                        {{ session('cupon') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)

                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset('images/products/' . $cart->product->firstImage) }}"
                                                    style="height: 70px; width:70px;" alt="">
                                                <h5>{{ $cart->product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $cart->product->price }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $cart->quantity }}" min="1">
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ $cart->quantity * $cart->price }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="cart/delete/{{ $cart->id }}"><span class="icon_close">
                                                </a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="/products" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if (Session::has('cupons'))
                            
                        @else
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="cupon/apply" method="POST">
                                    @csrf
                                    <input type="text" placeholder="Enter your coupon code" name="cupon">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div> <br>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                @if (Session::has('cupons'))

                                <li>Subtotal <span>{{ $subtotal }}</span></li>
                                <li>Discount <span>{{ $discount = $subtotal * session()->get('cupons')['percent']/100  }}Tk  ({{ session()->get('cupons')['percent']  }}%)</span></li>
                                @else
                                <li>Subtotal <span>{{ $subtotal }}</span></li>
                                @endif
                                <li>Total <span>{{ $subtotal-$discount }}</span></li>
                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    </body>

    </html>
@endsection
