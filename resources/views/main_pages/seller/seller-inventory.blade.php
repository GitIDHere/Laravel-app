@extends('layouts.master-seller')

@section('content')
<h1 class="page-header">My Inventroy</h1>
<a href="{{ URL::to('inventory/create') }}" class="btn btn-primary">+ Add Product</a>

<div>
    @foreach($products as $product)
      <div class="col-xs-6 col-sm-3 placeholder">
         <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="140" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
         <h4>{{Helper::ellipsis($product->product_title)}}</h4>
         <h5 class="text-primary">Price: {{Helper::displayMoneyFormat($product->product_price)}}</h5>
         <h5 class="text-primary">Category: {{$product->category_title}}</h5>
         <h5 class="text-primary">Current Stock: {{$product->stock_amount}}</h5>
         <h5 class="text-primary">Delivery Cost: {{$product->delivery_cost}}</h5>
         <a href="{{ URL::to('inventory', [$product->product_id]) }}" class="btn btn-primary">More Info</a>
      </div>
    @endforeach
</div>

@endsection()
