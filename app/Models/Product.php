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
      return $this->hasOne('App\Models\Category');
    }

    public function setFields(array $requestColumns){
        return $this->fill($requestColumns);
    }

}
