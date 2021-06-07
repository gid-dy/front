<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productimages(){
        return $this->hasMany('App\Product_Image','product_id');
    }
}
