@extends('masters.master-seller')

@section('content')
    <h1 class="page-header">Add Product To Sell</h1>

    {!! Breadcrumbs::render('Add-Product') !!}

    @include('partials.errors')

    <form id="add-product-form" class="col-md-12" method="post" action="{{ URL::route('seller-store-product') }}" enctype="multipart/form-data">

        @include ('partials.product-form')

        {{ csrf_field() }}

    </form>
@endsection()


@section('scripts.footer')

<script>
    Dropzone.autoDiscover = false;

    $(function(){
        var myDropzone = new Dropzone("div#productImage", {
            url: '/thing',
            addRemoveLinks: true,
            maxFiles: 5,
            maxFilesize: 2,
            autoProcessQueue:false
        });

        $('button#formSubmit').on('click',function(e){
            myDropzone.processQueue();
            $('form#add-product-form').submit();
            return false;
        });
    })
</script>

@endsection()
