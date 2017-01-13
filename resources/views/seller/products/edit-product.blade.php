@extends('masters.master-seller')

@section('content')
    <h1 class="page-header">Edit: {{ $product->product_title }}</h1>

    {!! Breadcrumbs::render('Edit-Product', $product) !!}

    <a href="{{ URL::route('seller-show-product', $product) }}" class="btn btn-primary">Back</a>

    @include('partials.errors')

    <form class="col-md-12" method="post" action="{{ URL::route('seller-update-product', $product) }}" >

        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="exampleInputEmail1">Product Title</label>
            <input type="text" name="product_title" class="form-control" value="{{ $product->product_title }}">
        </div>

        <div class="form-group">
            <label for="prodCategory">Product Category:</label>
            <select class="form-control" id="prodCategory" name="category_id">
                <option>Select category...</option>
                @foreach ($categories as $category)
                    @if($category->category_id === $product->category_id)
                        <option value="{{ $category->category_id }}" selected>{{ $category['title'] }}</option>
                    @else
                        <option value="{{ $category->category_id }}">{{ $category['title'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="number" step="0.01" name="product_price" class="form-control" value="{{ $product->product_price }}" >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Stock Amount</label>
            <input type="number" name="stock_amount" class="form-control" value="{{ $product->stock_amount }}" >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Delivery Charge</label>
            <input type="number" name="delivery_cost" class="form-control" value="{{ $product->delivery_cost }}" >
        </div>

        <div class="form-group">
            <label for="exampleTextarea">Short Description</label>
            <textarea class="form-control" name="short_description" id="exampleTextarea" rows="3">{{ $product->short_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleTextarea">Full Description</label>
            <textarea class="form-control" name="full_description" id="exampleTextarea" rows="3">{{ $product->full_description }}</textarea>
        </div>

        {{ csrf_field() }}

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection()
