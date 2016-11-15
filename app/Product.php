<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products_master';

    protected $fillable = ['product_name','price_id','product_image','product_text','genre_id','sales_start_date','sales_end_date'];

    public function productPrice() {
        return $this->belongsTo('App\ProductPrice','price_id');
    }

}
