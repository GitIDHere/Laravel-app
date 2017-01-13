<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $fillable = [
        'seller_name',
        'company_name',
        'company_email'
    ];

    protected $hidden = [
      'user_id',
      'seller_id'
    ];

    protected $primaryKey = 'seller_id';


    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function address(){
        return $this->hasOne('App\Models\SellerAddress');
    }

    //One product can have many outstanding orders
    public function outstandingOrder(){
        return $this->hasMany('App\Models\OutstandingOrder');
    }




    public function scopeGetSellerID($query, $userID){
        return $query->where('user_id', $userID)->first()->seller_id;
    }

    public function scopeGetSellerByUserID($query, $userID){
        return $query->where('user_id', $userID)->first();
    }

    public function addProduct($product){
        return $this->products()->create($product);
    }

    public function createAddress($address){
        return $this->address()->create($address);
    }

}
