<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProduct;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('sellersProduct', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get seller ID from the current user logged in
        $sellerID = Seller::getSellerID(Auth::user()->user_id);

        //Eager load the products attaching the categories title
        // 'category' refers to a function in the Product model
        $products = Product::where('seller_id', $sellerID)->with('category')->get();

        return view('seller.products.all-products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.products.add-product')
        ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //Find the seller
        $seller = Seller::getSellerByUserID(Auth::user()->user_id);

        $seller->addProduct($request->all());

        flash()->success('Success', 'Product successfully created');

        return Redirect::to('products');;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('seller.products.view-product')
        ->with('product', $product);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('seller.products.edit-product')
        ->with([
          'product' => $product,
          'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        //Populate the updated input fields into product
        $product->update($request->all());

        flash()->success('Success', 'Product successfully editted');

        return Redirect::to('products/'.$product->product_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        flash()->success('Success', 'Product successfully deleted');

        return Redirect::to('products/');
    }
}
