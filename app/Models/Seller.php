<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $fillable = [
        'company_name'
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

    public function getSellerID($userID){
        return $this->where('user_id', $userID)->first()->seller_id;
    }

}
