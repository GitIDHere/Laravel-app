@extends('layouts.master-seller')

@section('content')
  <h1 class="page-header">{{$product->product_title}}</h1>

  <a href="{{ URL::to('products') }}" class="btn btn-primary">Back</a>

  <a href="#" class="dropdown-toggle btn btn-danger" onclick="event.preventDefault(); document.getElementById('dlt-prod-frm').submit();">
      Delete
  </a>

  <form id="dlt-prod-frm" action="/products/{{$product->product_id}}" method="POST" style="display: none;">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
  </form>

  <p>Price: {{displayMoneyFormat($product->product_price)}}</p>
  <p>Stock: {{{$product->stock_amount}}}</p>
  <p>Delivery Cost: {{{$product->delivery_cost}}}</p>
  <p>Short Description: {{{$product->short_description}}}</p>
  <p>Full Description: {{{$product->full_description}}}</p>

  <a href="{{ url('products/'.$product->product_id.'/edit') }}" class="btn btn-primary">Edit</a>

@endsection()
