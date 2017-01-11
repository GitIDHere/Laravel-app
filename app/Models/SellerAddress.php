<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'postcode'
    ];

    protected $hidden = [
      'address_id',
      'seller_id'
    ];

    protected $table = 'seller_address';
    protected $primaryKey = 'address_id';

    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }

}
