@extends('layouts.master')

@section('content')
    <div>
        @foreach($products as $product)
            <p>product_title: {{$product->product_title}}</p>
            <p>product_price: {{$product->product_price}}</p>
            <p>stock_amount: {{$product->stock_amount}}</p>
            <p>deliver_cost: {{$product->deliver_cost}}</p>
            <p>short_description: {{$product->short_description}}</p>
            <p>full_description: {{$product->full_description}}</p>
            <br/>
            <br/>
        @endforeach
    </div>
@endsection
