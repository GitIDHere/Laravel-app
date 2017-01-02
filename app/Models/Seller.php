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
      return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function getSellerID($userID){
        return $this->where('user_id', $userID)->first()->seller_id;
    }

}
