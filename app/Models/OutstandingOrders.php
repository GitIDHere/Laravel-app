<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutstandingOrders extends Model
{
    protected $fillable = [
        'product_title',
        'quantity',
        'total_price',
        'product_price'
    ];

    protected $hidden = [
        'outstanding_orders_id', 'product_id'
    ];


    protected $table = 'outstanding_orders';
    protected $primaryKey = 'outstanding_orders_id';

    /*
    * - has one buyer (Buyer is able to view their outstanding orders)
    * - has one seller (Seller needs to know which products they need to ship)
    */

    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }


    public function getProductPriceAttribute($price){
        return number_format(($price / 100), 2);
    }

    public function setProductPriceAttribute($price){
        $this->attributes['product_price'] = $price * 100;
    }



    public function getTotalPriceAttribute($totalPrice){
        return number_format(($totalPrice / 100), 2);
    }

    public function setTotalPriceAttribute($totalPrice){
        $this->attributes['total_price'] = $totalPrice * 100;
    }






















}
