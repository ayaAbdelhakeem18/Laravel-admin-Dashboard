<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['id',"name","description","img","price","quantity","category_id",'brand_id','created_at','updated_at'];
   

    public function brand_id()
    {
        return $this->belongsTo(Brand::class);
    }
}
