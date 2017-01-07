@extends('masters.master-seller')

@section('content')
  <h1 class="page-header">{{$product->product_title}}</h1>

  {!! Breadcrumbs::render('Show-Product', $product) !!}

  <a href="{{ URL::route('all-products') }}" class="btn btn-primary">Back</a>

  <a href="#" class="dropdown-toggle btn btn-danger" onclick="event.preventDefault(); document.getElementById('dlt-prod-frm').submit();">
      Delete
  </a>

  <form id="dlt-prod-frm" action="{{ URL::route('destroy-product', $product) }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
  </form>

  <p>Price: {{ $product->product_price }}</p>
  <p>Stock: {{{$product->stock_amount}}}</p>
  <p>Delivery Cost: {{{$product->delivery_cost}}}</p>
  <p>Short Description: {{{$product->short_description}}}</p>
  <p>Full Description: {{{$product->full_description}}}</p>

  <a href="{{ URL::route('edit-product-form', $product) }}" class="btn btn-primary">Edit</a>

@endsection()
