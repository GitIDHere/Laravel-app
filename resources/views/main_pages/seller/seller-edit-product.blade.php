@extends('layouts.master-seller')

@section('content')
<h1 class="page-header">Edit: {{ $data['product']->product_title }}</h1>

<a href="{{ URL::route('show-product', $data['product']) }}" class="btn btn-primary">Back</a>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="col-md-12" method="post" action="{{ URL::route('update-product', $data['product'])}}" >

  {{ method_field('PUT') }}

  <div class="form-group">
    <label for="exampleInputEmail1">Product Title</label>
    <input type="text" name="product_title" class="form-control" value="{{ $data['product']->product_title }}">
  </div>

  <div class="form-group">
    <label for="prodCategory">Product Category:</label>
    <select class="form-control" id="prodCategory" name="category_id">
      <option>Select category...</option>
      @foreach ($data['categories'] as $category)
      @if($category['category_id'] === $data['product']->category_id)
        <option value="{{ $category['category_id'] }}" selected>{{ $category['title'] }}</option>
      @else
        <option value="{{ $category['category_id'] }}">{{ $category['title'] }}</option>
      @endif
      @endforeach
    </select>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="number" step="0.01" name="product_price" class="form-control" value="{{ $data['product']->product_price }}" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Stock Amount</label>
    <input type="number" name="stock_amount" class="form-control" value="{{ $data['product']->stock_amount }}" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Delivery Charge</label>
    <input type="number" name="delivery_cost" class="form-control" value="{{ $data['product']->delivery_cost }}" >
  </div>

  <div class="form-group">
    <label for="exampleTextarea">Short Description</label>
    <textarea class="form-control" name="short_description" id="exampleTextarea" rows="3">{{$data['product']->short_description}}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleTextarea">Full Description</label>
    <textarea class="form-control" name="full_description" id="exampleTextarea" rows="3">{{$data['product']->full_description}}</textarea>
  </div>

  {{ csrf_field() }}
  
  <button type="submit" class="btn btn-primary">Save</button>

</form>
@endsection()
