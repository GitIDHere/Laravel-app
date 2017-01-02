<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\StoreProduct;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;
use App\Helpers\Helper;

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
    public function index(Product $product, Seller $seller, Category $category)
    {
        $sellerID = $seller->getSellerID(Auth::user()->user_id);
        $products = $product->where('seller_id', $sellerID)->get();

        $categories = $category->all();

        for ($i=0; $i < count($products); $i++) {
          $products[$i]->category_title = $categories[$products[$i]->category_id - 1]->title;
        }

        return view('main_pages.seller.seller-inventory')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('main_pages.seller.seller-add-product')
        ->with('categories', $category->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request, Seller $seller, Product $product, Category $category)
    {
        //Set the fields that aren't in the form.
        $product->seller_id = $seller->getSellerID(Auth::user()->user_id);
        $product->category_id = $category->getCategoryID($request->get('category'));

        //Multiply the given money amount by 100 to remove decimal points
        //Merge replaces existing values as well
        $request->merge(['product_price' => Helper::dbMoneyFormat($request->product_price)]);

        $product->setFields($request->all());

        $product->save();

        return Redirect::to('inventory');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('main_pages.seller.seller-view-product')
        ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $product = Product::find($id);

        $categories = $category->all();

        return view('main_pages.seller.seller-edit-product')
        ->with('data', [
          'product' => $product,
          'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id, Seller $seller, Category $category)
    {
        $product = Product::find($id);

        //Populate the input params into product
        $product->setFields($request->all());

        //Set the category id
        $product->category_id = $category->getCategoryID($request->get('category'));

        //Multiply the given money amount by 100 to remove decimal points
        $product->product_price = Helper::dbMoneyFormat($request->product_price);

        $product->save();

        return Redirect::to('inventory/'.$product->product_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return Redirect::to('inventory/');
    }
}
