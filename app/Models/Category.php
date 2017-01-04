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
      return $this->belongsTo('App\Models\Product');
    }

    // public function getCategoryID($chosenCategory){
    //     return $this->where('title', $chosenCategory)->first()->category_id;
    // }
    //
    // public function getCategoryTitle($categoryID){
    //     return $this->where('category_id', $categoryID)->first()->category_title;
    // }

}
