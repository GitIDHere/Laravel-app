@extends('masters.master-seller')

@section('content')

  <div class="col-md-12">

    <h1>Seller Registration</h1>
    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper ac arcu eget efficitur. Sed in dui felis. </h2>

    <a href="{{ URL::route('my-account') }}" class="btn btn-primary">Back</a>

    <form action="{{ URL::route('seller-register-post') }}" method="POST" >

        <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('product_price') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Address Line 1</label>
            <input type="text" name="address_1" class="form-control" value="{{ old('product_price') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Address Line 2</label>
            <input type="text" name="address_2" class="form-control" value="{{ old('product_price') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Street</label>
            <input type="text" name="address_3" class="form-control" value="{{ old('product_price') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" name="address_4" class="form-control" value="{{ old('product_price') }}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Postcode</label>
            <input type="text" name="address_5" class="form-control" value="{{ old('product_price') }}">
        </div>

        {{ csrf_field() }}

        <button type="submit" id="formSubmit" class="btn btn-primary">Register</button>

    </form>

  </div>

@endsection
