@extends('layouts.frontend_layouts')
@section('title', 'Edit My Order ')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if ($edit_order)
                                    @foreach ($edit_order as $id => $details)
                                        @php  $total += $details['price'] * $details['qty']  @endphp
                                        <tr data-id="{{ $id = $details->id }}">
                                            <td data-th="Product" class="shoping__cart__item">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['product_img'] }}"
                                                            width="100" height="100" class="img-responsive" /></div>
                                                    <div class="col-sm-9">

                                                        <h4 class="nomargin"> <a
                                                                href="{{ route('shop.details.page', $details->product->slug) }}"
                                                                style="color: aqua">{{ $details['product_name'] }}</a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price" class="shoping__cart__price">${{ $details['price'] }}</td>
                                            @if ($shiping_status->shiping_status=="Pending")
                                            <td data-th="Quantity" class="shoping__cart__quantity">
                                                <input type="number" value="{{ $details['qty'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>  
                                            @else
                                            <td data-th="Quantity" class="shoping__cart__quantity">
                                                <input readonly type="number" value="{{ $details['qty'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>
                                            @endif
                                            
                                            <td data-th="Subtotal" class="shoping__cart__total">
                                                ${{ $details['price'] * $details['qty'] }}</td>
                                  
                                            @if ($shiping_status->shiping_status=="Pending")
                                               <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </td>  
                                            @else
                                            <td class="actions" data-th="">
                                                <button disabled class="btn btn-danger btn-sm remove-from-cart"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </td>
                                            @endif
                                               
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script type="text/javascript">
        $(".update-cart").on('change', function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.myorder') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },

                success: function(response) {
                    $('table').load(location.href + ' .table');
                    window.location.reload();
                }

            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('order.remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        $('table').load(location.href + ' .table');
                        window.location.reload();
                    }
                });
            }
        });
    </script>

@endsection
