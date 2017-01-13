@extends('masters.master-buyer')

@section('content')

  <div class="col-md-12">

    <h1 class="page-header">Seller Registration</h1>

    @include('partials/errors')

    <a href="{{ URL::route('my-account') }}" class="btn btn-primary">Back</a>

    <form action="{{ URL::route('seller-register-post') }}" method="POST" >

        <div class="form-group">
            <label>Seller Name</label>
            <input type="text" name="seller_name" class="form-control" value="{{ old('seller_name') }}">
        </div>

        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}">
        </div>

        <div class="form-group">
            <label>Company Email</label>
            <input type="email" name="company_email" class="form-control" value="{{ old('company_email') }}">
        </div>

        <div class="form-group">
            <label>Address Line 1</label>
            <input type="text" name="address_line_1" class="form-control" value="{{ old('address_line_1') }}">
        </div>

        <div class="form-group">
            <label>Address Line 2</label>
            <input type="text" name="address_line_2" class="form-control" value="{{ old('address_line_2') }}">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
        </div>

        <div class="form-group">
            <label>Postcode</label>
            <input type="text" name="postcode" class="form-control" value="{{ old('postcode') }}">
        </div>

        {{ csrf_field() }}

        <button type="submit" id="formSubmit" class="btn btn-primary">Register</button>

    </form>

  </div>

@endsection
