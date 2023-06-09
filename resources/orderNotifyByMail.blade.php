<!DOCTYPE html>
<html>
<head>
    <title>Generate Invoice </title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#1</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{ $orderDetails->id }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Date - <span
                    class="gray-color">{{ $orderDetails->updated_at->format('M d, Y') }}</span></p>
        </div>
        @php
            $data = App\Models\FrontnendSetting::all()->first();
            $frontendData = App\Models\FrontnendSetting::all()->first();
        @endphp
        <div class="w-50 float-left logo mt-10">

            <img src="https://themewagon.github.io/ogani/img/logo.png" alt="Logo">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">From</th>
                <th class="w-50">To</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p> Name : {{ $frontendData->name }},</p>
                        <p> Email: {{ $frontendData->email }},</p>
                        <p> Mobile: {{ $frontendData->tel }},</p>
                        <p> Adress :{{ $frontendData->address }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p> Name : {{ $orderDetails->name }},</p>
                        <p> Email: {{ $orderDetails->email }},</p>
                        <p> Mobile: {{ $orderDetails->userdetail->phone }},</p>
                        <p> Adress :{{ $orderDetails->address }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Product Name</th>
                <th class="w-50">Price</th>
                <th class="w-50">Qty</th>
                <th class="w-50">Subtotal</th>
            </tr>
            @php $total = 0 @endphp
            @foreach ($product_details as $product_detail)
                @php $total += $product_detail['price'] * $product_detail['qty'] @endphp
                <tr align="center">

                    <td>{{ $product_detail->product_name }}</td>
                    <td>${{ $product_detail->price }}</td>
                    <td>{{ $product_detail->qty }}</td>
                    <td>${{ $product_detail->price * $product_detail->qty }}</td>

                </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Total Pay</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>${{ $total }}</p>
                            <p>$${{ $total }}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-50">Payment Method</th>
                    <th class="w-50">Shipping Method</th>
                </tr>
                <tr>
                    <td class="text-center">Stripe PAymet</td>
                    <td class="text-center">Free Shipping </td>
                </tr>
            </table>
        </div>
    </div>

</html>
