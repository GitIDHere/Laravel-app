<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = [
        'category_id'
    ];

    protected $primaryKey = 'category_id';

    protected $table = 'categories';

    public function product(){
      return $this->hasMany('App\Models\Product');
    }

}
