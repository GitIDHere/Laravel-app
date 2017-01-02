<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_title',
        'product_price',
        'stock_amount',
        'delivery_cost',
        'short_description',
        'full_description'
    ];

    protected $hidden = [
        'seller_id', 'category_id', 'product_id'
    ];

    protected $primaryKey = 'product_id';

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function category(){
      return $this->hasOne(Category::class, 'category_id');
    }

    public function setFields(array $requestColumns){
        return $this->fill($requestColumns);
    }

}
