<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id',
        'product_title',
        'product_price',
        'stock_amount',
        'delivery_cost',
        'short_description',
        'full_description'
    ];

    protected $hidden = [
        'seller_id', 'product_id'
    ];

    protected $primaryKey = 'product_id';

    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }

    public function category(){
      return $this->belongsTo('App\Models\Category');
    }

    public function outstandingOrder(){
        return $this->hasMany('App\Models\OutstandingOrder');
    }


    public function getProductPriceAttribute($price){
        return number_format(($price / 100), 2);
    }
    public function setProductPriceAttribute($price){
        $this->attributes['product_price'] = $price * 100;
    }


    public function getDeliveryCostAttribute($cost){
        return number_format(($cost / 100), 2);
    }
    public function setDeliveryCostAttribute($cost){
        $this->attributes['delivery_cost'] = $cost * 100;
    }

}
