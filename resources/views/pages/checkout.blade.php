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
                            <h2>Checkout</h2>
                            <div class="breadcrumb__option">
                                {{-- <a href="/products">Home</a>
                                <span>Shopping Cart</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
        <section class="checkout spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your
                            code
                        </h6>
                    </div>
                </div>
                <div class="checkout__form">
                    <h4>Billing Details</h4>
                    <form action="place-order">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p> Name<span>*</span></p>
                                            <input type="text" style="color: black" value="{{ $user->name }}" name="name">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" style="color: black" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" style="color: black" value="{{ $user->email }}" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" placeholder="Eg. Road -11, House-30, Uttara-10"
                                        class="checkout__input__add" style="color: black" name="address">
                                </div>
                                <div class="checkout__input">
                                    <p>Town/City<span>*</span></p>
                                    <input type="text" name="city">
                                </div>

                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span>*</span></p>
                                    <input type="text" name="post_code">
                                </div>




                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="checkout__order">
                                    <h4>Your Order</h4>
                                    <div class="checkout__order__products">Products <span>Total</span></div>
                                    <ul>
                                        @foreach ($cart_products as $cart)


                                            <li>{{ $cart->product->name }}<span>{{ $cart->product->price }} X
                                                    {{ $cart->quantity }}</span></li>

                                        @endforeach
                                    </ul>
                                    <div class="checkout__order__subtotal">Subtotal <span>{{ $subtotal }}Tk</span></div>
                                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">




                                    @if (Session::has('cupons'))
                                        <div class="checkout__order__subtotal">Discount
                                            <span>{{ $discount = ($subtotal * session()->get('cupons')['percent']) / 100 }}Tk
                                                ({{ session()->get('cupons')['percent'] }}%)</span>
                                            <input type="hidden" name="discount" value="{{ $discount }}">
                                        </div>
                                        <div class="checkout__order__total">Total
                                            <span>{{ $total = $subtotal - ($subtotal * session()->get('cupons')['percent']) / 100 }}Tk</span>
                                            <input type="hidden" name="total" value="{{ $total }}">

                                        </div>

                                    @else
                                        <div class="checkout__order__total">Total
                                            Total <span>{{ $subtotal }}Tk</span>
                                            <input type="hidden" name="total" value="{{ $subtotal }}">
                                        </div>
                                    @endif




                                    <h5>Select Payment method</h5>


                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Cash On Delivary
                                            <input type="checkbox" id="payment" value="handcash" name="payment_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                   
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Paypal
                                            <input type="checkbox" id="paypal" value="paypal" name="payment_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                   
                                    <button type="submit" class="site-btn">PLACE ORDER</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </body>

    </html>
@endsection
