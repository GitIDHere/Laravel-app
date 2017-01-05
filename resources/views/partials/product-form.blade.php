<div class="form-group">
    <label for="exampleInputEmail1">Product Title</label>
    <input type="text" name="product_title" class="form-control" value="{{ old('product_title') }}">
</div>

<div class="form-group">
    <label for="prodCategory">Product Category:</label>
    <select class="form-control" id="prodCategory" name="category_id">
        <option>Select category...</option>
        @foreach ($categories as $id => $category)
            <option value="{{ $category['category_id'] }}">{{ $category['title'] }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="number" step="0.01" name="product_price" class="form-control" value="{{ old('product_price') }}">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Stock Amount</label>
    <input type="number" name="stock_amount" class="form-control" value="{{ old('stock_amount') }}">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Delivery Charge</label>
    <input type="number" name="delivery_cost" class="form-control" value="{{ old('delivery_cost') }}">
</div>

<div class="form-group">
    <label for="exampleTextarea">Short Description</label>
    <textarea class="form-control" name="short_description" id="exampleTextarea" rows="3">{{ old('short_description') }}</textarea>
</div>

<div class="form-group">
    <label for="exampleTextarea">Full Description</label>
    <textarea class="form-control" name="full_description" id="exampleTextarea" rows="3">{{ old('full_description') }}</textarea>
</div>

<div class="form-group ">
    <label for="exampleInputFile">Product Images</label>
    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    <!-- <div id="productImage" class="dropzone" name="product-photos"></div> -->
    <input type="file" id="productImage" class="form-control-file dropzone" name="product-photos">
</div>

<button type="submit" id="formSubmit" class="btn btn-primary">Submit</button>
