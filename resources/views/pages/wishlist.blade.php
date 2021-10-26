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
        <!-- Hero Section End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Wishlist Products</h2>
                            <div class="breadcrumb__option">
                                <a href="/products">Home</a>
                                <span>Wishlists</span>
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
                @if (session('delete'))
                    <div class="alert alert-success alert-dismissble fade show" role="alert">
                        {{ session('delete') }}
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
                                        <th>Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Wishlistproducts as $Wishproduct)

                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset('images/products/' . $Wishproduct->product->firstImage) }}"
                                                    style="height: 70px; width:70px;" alt="">
                                                <h5>{{ $Wishproduct->product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $Wishproduct->product->price }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <form action="/add/to-cart/{{ $Wishproduct->product->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="price" value="{{ $Wishproduct->product->price }}">
                                                    <button class="btn btn-success">Add to Cart</button>

                                                </form>
                                            </td>
                        
                                            <td class="shoping__cart__item__close">
                                                <a href="wishlist/delete/{{ $Wishproduct->id }}"><span class="icon_close">
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
                
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    </body>

    </html>
@endsection
