@extends('layouts.frontend_layouts')
@section('content')
    <style>
        a.active {

            color: #fff;
            background-color: #7fad39;
            border-color: #f3f6fa !important;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
            opacity: 0.6;
        }

        ul li.active_nav a {
            font-weight: bold;
            color: #7fad39;
        }
    </style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                {{-- @php

                                dd('category/sort/'.$category->slug'/*');
                            @endphp --}}
                                @foreach ($categories as $category)
                                    <li
                                        @if (isset($nav)) class="{{ request()->is('category/sort/' . $category->slug) ? 'active_nav' : '' }}"
                        @else
                        class="{{ request()->is('category/' . $category->slug) ? 'active_nav' : '' }}" @endif>
                                        <a href="{{ url('category/' . $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <form action="{{ route('search.shop') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <label for="min_price">Min Price</label>
                                    <input type="number" class="form-control" value="{{ old('min_price') }}" id="min_price"
                                        name="min_price">
                                </div>
                                <div class="form-group">
                                    <label for="max_price">Max Price</label>
                                    <input type="number" class="form-control" value="{{ old('max_price') }}" id="max_price"
                                        name="max_price">
                                </div>
                                <button type="submit" class=" site-btn">Search</button>
                            </form>
                            {{-- <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="1000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div> --}}
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach ($latest_products->chunk(3) as $chunk)
                                        <div class="latest-prdouct__slider__item">
                                            @foreach ($chunk as $latest_product)
                                                <!-- Display product information here -->
                                                <a href="{{ url('shop-details/' . $latest_product->slug) }}"
                                                    class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{ $latest_product->thumbnail_image }}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $latest_product->name }}</h6>
                                                        <span>${{ $latest_product->price }}</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <form action="{{ route('short.by.category', $product_category_slug) }}" method="GET"
                                        id="formname">
                                        {{-- <input type="hidden" name="category_id" value="{{$product_category_id->id}}"> --}}
                                        <select id="dropdown" name="data" onchange="this.form.submit()">
                                            <option
                                                {{ request()->is('category/sort', $product_category_slug) ? 'selected' : '' }}
                                                value="back">Default</option>
                                            <option
                                                {{ request()->getRequestUri() == '/category/sort/' . $product_category_slug . '?data=asc' ? 'selected' : '' }}
                                                value="asc">Sort by Name (A-Z)</option>
                                            <option
                                                {{ request()->getRequestUri() == '/category/sort/' . $product_category_slug . '?data=desc' ? 'selected' : '' }}
                                                value="desc">Sort by Price (High to Low)</option>
                                        </select>
                                    </form>

                                    {{-- <form >
                                    <input type="hidden" name="name"  value="asc">
                                    <button class="btn active" type="submit"></button>
                                </form>
                                <form action="{{ route('short.by',) }}" method="GET">
                                    <input type="hidden" name="price"  value="desc">
                                    <button  class="btn active"></button>
                                </form> --}}
                                    {{-- <button class="btn" onclick="sortProducts('name', 'asc')">Sort by Name (A-Z)</button> --}}
                                    {{-- <button  class="btn" onclick="sortProducts('price', 'desc')">Sort by Price (High to Low)</button> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ count($products) }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="product-list">
                    </div>

                    <div class="row" id="product_old_list">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6" id="product-container">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $product->thumbnail_image }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li>
                                                <form id="add_to_cart" action="{{ route('add.to.cart', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" value="1" name="qty">
                                                    <a onclick='$("#add_to_cart").submit()' type="submit"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ url('shop-details/' . $product->slug) }}">{{ $product->name }}</a>
                                        </h6>
                                        <h5>${{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        {!! $products->withQueryString()->links('pagination::custom') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <script>
        function sortProducts(column, order) {

            $.ajax({
                url: "{{ route('short.by') }}",
                method: 'get',
                data: {

                    column: column,
                    order: order
                },
                success: function(response) {
                    // Handle the sorted products in the response
                    let a = $('#product-list').html(response);
                    if (a) {
                        $('#product_old_list').hide();
                    }
                    console.log(response);
                    // Update your HTML or perform any other operations with the sorted products
                },
                error: function(xhr, status, error) {
                    // Handle the error if the request fails
                    console.error(error);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#min_price').on('change', function() {
                var min_price = $(this).val();

                $('#max_price').attr('min', min_price);
            });

            $('#max_price').on('change', function() {
                var max_price = $(this).val();

                $('#min_price').attr('max', max_price);
            });

            // Submit the form when the user presses Enter on the search input
            $('#search').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    $('#search-form').submit();
                }
            });
        });
    </script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
