@extends('masters.master-seller')

@section('content')

<h1 class="page-header">Orders</h1>

<h2 class="sub-header">Outstanding Orders</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Title</th>
                <th>Price</th>
                <th>Order Quantity</th>
                <th>Total Price</th>
                <th>In Stock</th>
                <th>Order Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outstandingOrders as $order)
            <tr>
                <td>{{ $order->outstanding_orders_id }}</td>
                <td>{{ $order->product_title }}</td>
                <td>£{{ $order->product_price }}</td>
                <td>{{ $order->quantity }}</td>
                <td>£{{ $order->total_price }}</td>
                <td>{{ $order->product->stock_amount }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection()
