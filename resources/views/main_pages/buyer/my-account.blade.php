@extends('masters.master-buyer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Account</div>
                <div class="panel-body">

                  <a class="btn btn-primary" href="">Shop</a>

                  <a class="btn btn-success" href="{{ url('seller-dashboard') }}">Sell</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
