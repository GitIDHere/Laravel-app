<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreProduct;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;

class InventoryController extends Controller
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
        $products = Product::where('seller_id', Auth::user()->user_id)->with('category')->get();

        return view('main_pages.seller.seller-inventory')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main_pages.seller.seller-add-product')
        ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request, Seller $seller)
    {
        //Find the seller
        $seller = Seller::where('user_id', Auth::user()->user_id)->first();

        $seller->products()->create($request->all());

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
        return view('main_pages.seller.seller-view-product')
        ->with('product', $product);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category)
    {
        return view('main_pages.seller.seller-edit-product')
        ->with('data', [
          'product' => $product,
          'categories' => $category->all()
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
        return Redirect::to('products/');
    }
}
